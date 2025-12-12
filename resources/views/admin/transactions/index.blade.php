@extends('layouts.admin')
@section('title','Transactions')
@section('content')
<div class="header-card">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-0"><i class="bi bi-credit-card"></i> Kelola Transaksi</h2>
            <p class="text-muted mb-0">Daftar semua transaksi pembayaran</p>
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
                        <th><i class="bi bi-calendar-check"></i> Booking</th>
                        <th><i class="bi bi-person"></i> User</th>
                        <th><i class="bi bi-cash"></i> Jumlah</th>
                        <th><i class="bi bi-credit-card"></i> Metode</th>
                        <th><i class="bi bi-info-circle"></i> Status</th>
                        <th><i class="bi bi-calendar"></i> Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($transactions ?? [] as $t)
                    <tr>
                        <td><strong>#{{ $t->id }}</strong></td>
                        <td>
                            <span class="badge bg-info">Booking #{{ $t->booking_id }}</span>
                        </td>
                        <td>{{ optional($t->booking->user)->name ?? '-' }}</td>
                        <td>
                            <strong class="text-primary">Rp {{ number_format($t->amount ?? 0, 0, ',', '.') }}</strong>
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ ucfirst($t->payment_method ?? 'manual') }}</span>
                        </td>
                        <td>
                            @if($t->status == 'paid')
                                <span class="badge bg-success"><i class="bi bi-check-circle"></i> Lunas</span>
                            @elseif($t->status == 'pending')
                                <span class="badge bg-warning"><i class="bi bi-hourglass"></i> Pending</span>
                            @elseif($t->status == 'failed')
                                <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Gagal</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($t->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $t->created_at ? $t->created_at->format('d M Y H:i') : '-' }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $t->id }}">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{ $t->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title"><i class="bi bi-receipt"></i> Detail Transaksi #{{ $t->id }}</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="150">ID Transaksi:</th>
                                            <td>#{{ $t->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>ID Booking:</th>
                                            <td>#{{ $t->booking_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>User:</th>
                                            <td>{{ optional($t->booking->user)->name ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah:</th>
                                            <td><strong class="text-primary">Rp {{ number_format($t->amount ?? 0, 0, ',', '.') }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Metode:</th>
                                            <td>{{ ucfirst($t->payment_method ?? 'manual') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status:</th>
                                            <td>{{ ucfirst($t->status) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal:</th>
                                            <td>{{ $t->created_at ? $t->created_at->format('d M Y H:i') : '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <i class="bi bi-inbox display-1 text-muted"></i>
                            <p class="mt-3 text-muted">Belum ada transaksi.</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
