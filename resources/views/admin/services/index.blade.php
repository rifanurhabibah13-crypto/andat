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
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $s->id }}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <form action="{{ route('admin.services.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus layanan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
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
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Tambah Layanan Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Layanan</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Sound Engineer" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi layanan..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga</label>
                        <input type="number" name="price" class="form-control" placeholder="50000" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modals -->
@foreach($services ?? [] as $service)
<div class="modal fade" id="editModal{{ $service->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title"><i class="bi bi-pencil"></i> Edit Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Layanan</label>
                        <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3">{{ $service->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga</label>
                        <input type="number" name="price" class="form-control" value="{{ $service->price }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
