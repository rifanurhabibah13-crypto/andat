@extends('layouts.main')

@section('title','Profil')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="mb-4">
            <h2 class="text-white fw-bold"><i class="bi bi-person-circle"></i> Profil Saya</h2>
            <p class="text-white-50">Kelola informasi akun Anda</p>
        </div>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-person-badge"></i> Informasi Profil</h5>
            </div>
            <div class="card-body p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('user.profile.update') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-bold"><i class="bi bi-person"></i> Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label fw-bold"><i class="bi bi-envelope"></i> Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                            <small class="text-muted">Email tidak dapat diubah</small>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label fw-bold"><i class="bi bi-telephone"></i> Nomor Telepon</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                   value="{{ old('phone', $user->phone) }}" placeholder="08xxxxxxxxxx">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h6 class="fw-bold mb-3"><i class="bi bi-shield-lock"></i> Ubah Password</h6>
                    <p class="text-muted small">Kosongkan jika tidak ingin mengubah password</p>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold"><i class="bi bi-lock"></i> Password Baru</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Minimal 8 karakter">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label fw-bold"><i class="bi bi-lock-fill"></i> Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" 
                                   placeholder="Ulangi password baru">
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-save"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4">
                        <i class="bi bi-calendar-check text-primary display-6"></i>
                        <h5 class="mt-2 mb-0">{{ \App\Models\Booking::where('user_id', $user->id)->count() }}</h5>
                        <small class="text-muted">Total Booking</small>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-clock text-success display-6"></i>
                        <h5 class="mt-2 mb-0">{{ \App\Models\Booking::where('user_id', $user->id)->where('status', 'confirmed')->count() }}</h5>
                        <small class="text-muted">Booking Selesai</small>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-person-check text-info display-6"></i>
                        <h5 class="mt-2 mb-0">{{ $user->created_at->diffForHumans() }}</h5>
                        <small class="text-muted">Member Sejak</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
