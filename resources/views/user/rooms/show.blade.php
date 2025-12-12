@extends('layouts.main')

@section('title', $room->name)
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h2 class="fw-bold mb-2">{{ $room->name }}</h2>
                        <div class="text-muted">
                            <i class="bi bi-people"></i> Kapasitas: {{ $room->capacity }} orang
                        </div>
                    </div>
                    <h3 class="text-primary fw-bold mb-0">Rp {{ number_format($room->price_per_hour, 0, ',', '.') }}<small class="text-muted fs-6">/jam</small></h3>
                </div>
                
                <hr>
                
                <h5 class="fw-bold mb-3"><i class="bi bi-info-circle"></i> Deskripsi</h5>
                <p class="text-muted">{{ $room->description ?? 'Studio musik dengan fasilitas lengkap dan peralatan berkualitas tinggi. Cocok untuk recording, latihan band, atau produksi musik.' }}</p>
                
                <hr>
                
                <h5 class="fw-bold mb-3"><i class="bi bi-star"></i> Fasilitas</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>AC & Ventilasi</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>Sound System</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>Instrumen Musik</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>WiFi Gratis</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card sticky-top" style="top: 20px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4"><i class="bi bi-calendar-check"></i> Booking</h5>
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Harga per jam</span>
                        <span class="fw-bold">Rp {{ number_format($room->price_per_hour, 0, ',', '.') }}</span>
                    </div>
                </div>
                <a href="{{ route('user.booking.create', $room->id) }}" class="btn btn-primary w-100 btn-lg">
                    <i class="bi bi-calendar-plus"></i> Booking Sekarang
                </a>
                <div class="text-center mt-3">
                    <small class="text-muted"><i class="bi bi-shield-check"></i> Pembayaran aman & terpercaya</small>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-body">
                <a href="{{ route('user.rooms.index') }}" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Ruangan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
