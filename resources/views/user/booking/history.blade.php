@extends('layouts.main')

@section('title','Riwayat Booking')
@section('content')
<div class="mb-4">
    <h2 class="text-white fw-bold"><i class="bi bi-clock-history"></i> Riwayat Booking Saya</h2>
    <p class="text-white-50">Menampilkan semua riwayat booking Anda (Total: {{ $bookings->count() }} booking)</p>
</div>

<div class="card">
    <div class="card-body">
        @if($bookings->count() > 0)
        <div class="alert alert-info mb-3">
            <i class="bi bi-info-circle"></i> Menampilkan <strong>{{ $bookings->count() }}</strong> booking dari semua status (Pending, Confirmed, Cancelled)
        </div>
        @endif
        
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th><i class="bi bi-door-open"></i> Ruangan</th>
                        <th><i class="bi bi-calendar3"></i> Tanggal</th>
                        <th><i class="bi bi-clock"></i> Waktu</th>
                        <th><i class="bi bi-info-circle"></i> Status Booking</th>
                        <th><i class="bi bi-credit-card"></i> Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($bookings as $b)
                    <tr>
                        <td><strong>#{{ $b->id }}</strong></td>
                        <td>
                            <strong>{{ $b->room ? $b->room->name : 'Ruangan tidak ditemukan' }}</strong>
                        </td>
                        <td>{{ $b->date ? date('d M Y', strtotime($b->date)) : '-' }}</td>
                        <td>
                            <small class="text-muted">
                                @if($b->start_time && $b->end_time)
                                    {{ substr($b->start_time, 0, 5) }} - {{ substr($b->end_time, 0, 5) }}
                                @else
                                    -
                                @endif
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
                            @elseif($b->payment_status == 'unpaid')
                                <span class="badge bg-danger"><i class="bi bi-x"></i> Belum Bayar</span>
                            @else
                                <span class="badge bg-warning">{{ ucfirst($b->payment_status ?? 'unpaid') }}</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $b->id }}">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{ $b->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Booking</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Ruangan:</th>
                                            <td>{{ optional($b->room)->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal:</th>
                                            <td>{{ $b->date ? date('d M Y', strtotime($b->date)) : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Waktu:</th>
                                            <td>
                                                @if($b->start_time && $b->end_time)
                                                    {{ substr($b->start_time, 0, 5) }} - {{ substr($b->end_time, 0, 5) }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        @if($b->service)
                                        <tr>
                                            <th>Layanan:</th>
                                            <td>{{ $b->service }}</td>
                                        </tr>
                                        @endif
                                        @if($b->notes)
                                        <tr>
                                            <th>Catatan:</th>
                                            <td>{{ $b->notes }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>Total Harga:</th>
                                            <td><strong>Rp {{ number_format($b->total_price ?? 0, 0, ',', '.') }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-inbox display-1 text-muted"></i>
                            <p class="mt-3 text-muted">Belum ada riwayat booking. <a href="{{ route('user.rooms.index') }}" class="text-decoration-none">Mulai booking sekarang!</a></p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
