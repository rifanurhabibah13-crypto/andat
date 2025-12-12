@extends('layouts.admin')
@section('title','Admin Rooms')
@section('content')
<div class="header-card">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-0"><i class="bi bi-door-open"></i> Kelola Ruangan</h2>
            <p class="text-muted mb-0">Atur dan kelola semua ruangan studio</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-plus-circle"></i> Tambah Ruangan
        </button>
    </div>
</div>

<div class="row g-4">
    @forelse($rooms ?? [] as $room)
    <div class="col-md-6 col-xl-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h5 class="fw-bold mb-0">{{ $room->name }}</h5>
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $room->id }}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-outline-danger" onclick="return confirm('Yakin hapus ruangan ini?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
                <p class="text-muted small">{{ Str::limit($room->description, 80) ?? 'Tidak ada deskripsi' }}</p>
                <hr>
                <div class="row text-center">
                    <div class="col-6">
                        <div class="mb-1"><i class="bi bi-people text-primary"></i></div>
                        <div class="fw-bold">{{ $room->capacity }}</div>
                        <small class="text-muted">Kapasitas</small>
                    </div>
                    <div class="col-6">
                        <div class="mb-1"><i class="bi bi-currency-dollar text-success"></i></div>
                        <div class="fw-bold">Rp {{ number_format($room->price_per_hour, 0, ',', '.') }}</div>
                        <small class="text-muted">per jam</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="bi bi-inbox display-1 text-muted"></i>
                <p class="mt-3 text-muted">Belum ada ruangan. Tambahkan ruangan pertama Anda!</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="bi bi-plus-circle"></i> Tambah Ruangan
                </button>
            </div>
        </div>
    </div>
    @endforelse
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Tambah Ruangan Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Ruangan</label>
                        <input type="text" class="form-control" placeholder="Contoh: Studio A" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea class="form-control" rows="3" placeholder="Deskripsi ruangan..."></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Kapasitas</label>
                            <input type="number" class="form-control" placeholder="10" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Harga/Jam</label>
                            <input type="number" class="form-control" placeholder="100000" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
