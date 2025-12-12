@extends('layouts.admin')
@section('title','Services')
@section('content')
<div class="header-card">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-0"><i class="bi bi-gear"></i> Kelola Layanan</h2>
            <p class="text-muted mb-0">Atur layanan tambahan yang tersedia</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-plus-circle"></i> Tambah Layanan
        </button>
    </div>
</div>

<div class="row g-4">
    @forelse($services ?? [] as $s)
    <div class="col-md-6 col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" 
                         style="width: 50px; height: 50px;">
                        <i class="bi bi-gear fs-4 text-primary"></i>
                    </div>
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-outline-danger" onclick="return confirm('Yakin hapus layanan ini?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
                <h5 class="fw-bold mb-2">{{ $s->name }}</h5>
                <p class="text-muted small mb-3">{{ Str::limit($s->description, 80) ?? 'Layanan profesional untuk studio musik' }}</p>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted">Harga:</span>
                    <h5 class="mb-0 text-primary fw-bold">Rp {{ number_format($s->price, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="bi bi-inbox display-1 text-muted"></i>
                <p class="mt-3 text-muted">Belum ada layanan. Tambahkan layanan pertama Anda!</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="bi bi-plus-circle"></i> Tambah Layanan
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
                <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Tambah Layanan Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Layanan</label>
                        <input type="text" class="form-control" placeholder="Contoh: Sound Engineer" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea class="form-control" rows="3" placeholder="Deskripsi layanan..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga</label>
                        <input type="number" class="form-control" placeholder="50000" required>
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
