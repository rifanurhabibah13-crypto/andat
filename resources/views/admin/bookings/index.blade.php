@extends('layouts.admin')
@section('title','Bookings')
@section('content')
<div class="header-card">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-0"><i class="bi bi-calendar-check"></i> Kelola Booking</h2>
            <p class="text-muted mb-0">Daftar semua booking dari customer</p>
        </div>
        <button class="btn btn-primary" onclick="window.print()">
            <i class="bi bi-printer"></i> Print
        </button>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th><i class="bi bi-person"></i> User</th>
                        <th><i class="bi bi-door-open"></i> Ruangan</th>
                        <th><i class="bi bi-calendar3"></i> Tanggal</th>
                        <th><i class="bi bi-clock"></i> Waktu</th>
                        <th><i class="bi bi-info-circle"></i> Status</th>
                        <th><i class="bi bi-credit-card"></i> Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($bookings ?? [] as $b)
                    <tr>
                        <td><strong>#{{ $b->id }}</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" 
                                     style="width: 35px; height: 35px; font-weight: bold;">
                                    {{ substr(optional($b->user)->name, 0, 1) }}
                                </div>
                                <div class="ms-2">
                                    <div class="fw-bold">{{ optional($b->user)->name }}</div>
                                    <small class="text-muted">{{ optional($b->user)->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>{{ optional($b->room)->name }}</strong>
                            <br><small class="text-muted">{{ optional($b->room)->capacity }} orang</small>
                        </td>
                        <td>{{ date('d M Y', strtotime($b->date)) }}</td>
                        <td>
                            <small>
                                {{ date('H:i', strtotime($b->start_time)) }} - {{ date('H:i', strtotime($b->end_time)) }}
                            </small>
                        </td>
                        <td>
                            @if($b->status == 'pending')
                                <span class="badge bg-warning"><i class="bi bi-hourglass-split"></i> Pending</span>
                            @elseif($b->status == 'confirmed')
                                <span class="badge bg-success"><i class="bi bi-check-circle"></i> Confirmed</span>
                            @elseif($b->status == 'cancelled')
                                <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Cancelled</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($b->status) }}</span>
                            @endif
                        </td>
                        <td>
                            @if($b->payment_status == 'paid')
                                <span class="badge bg-success"><i class="bi bi-check2"></i> Lunas</span>
                            @else
                                <span class="badge bg-danger"><i class="bi bi-x"></i> Belum Bayar</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $b->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{ $b->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title"><i class="bi bi-info-circle"></i> Detail Booking #{{ $b->id }}</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-bold mb-3">Informasi Customer</h6>
                                            <table class="table table-sm">
                                                <tr>
                                                    <th width="120">Nama:</th>
                                                    <td>{{ optional($b->user)->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email:</th>
                                                    <td>{{ optional($b->user)->email }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bold mb-3">Informasi Booking</h6>
                                            <table class="table table-sm">
                                                <tr>
                                                    <th width="120">Ruangan:</th>
                                                    <td>{{ optional($b->room)->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal:</th>
                                                    <td>{{ date('d M Y', strtotime($b->date)) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Waktu:</th>
                                                    <td>{{ $b->start_time }} - {{ $b->end_time }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    @if($b->service)
                                    <hr>
                                    <h6 class="fw-bold">Layanan Tambahan:</h6>
                                    <p>{{ $b->service }}</p>
                                    @endif
                                    @if($b->notes)
                                    <hr>
                                    <h6 class="fw-bold">Catatan:</h6>
                                    <p>{{ $b->notes }}</p>
                                    @endif
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">Total Harga:</h6>
                                        <h4 class="mb-0 text-primary fw-bold">Rp {{ number_format($b->total_price ?? 0, 0, ',', '.') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <i class="bi bi-inbox display-1 text-muted"></i>
                            <p class="mt-3 text-muted">Belum ada booking.</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
