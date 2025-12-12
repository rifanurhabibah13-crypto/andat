@extends('layouts.main')

@section('title','Dashboard')

@section('content')
<div class="mb-4">
    <h2 class="text-white fw-bold">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
    <p class="text-white-50">Kelola booking dan profil Anda di sini</p>
</div>

@php
    $userId = auth()->id();
    $totalBooking = \App\Models\Booking::where('user_id', $userId)->count();
    $pendingBooking = \App\Models\Booking::where('user_id', $userId)->where('status', 'pending')->count();
    $confirmedBooking = \App\Models\Booking::where('user_id', $userId)->where('status', 'confirmed')->count();
    $cancelledBooking = \App\Models\Booking::where('user_id', $userId)->where('status', 'cancelled')->count();
@endphp

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card text-white h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);">
            <div class="card-body text-center p-4">
                <i class="bi bi-calendar-check display-1 mb-3"></i>
                <h3 class="fw-bold mb-2">{{ $totalBooking }}</h3>
                <p class="mb-0">Total Booking</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white h-100" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); box-shadow: 0 10px 30px rgba(240, 147, 251, 0.3);">
            <div class="card-body text-center p-4">
                <i class="bi bi-hourglass-split display-1 mb-3"></i>
                <h3 class="fw-bold mb-2">{{ $pendingBooking }}</h3>
                <p class="mb-0">Pending</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white h-100" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); box-shadow: 0 10px 30px rgba(79, 172, 254, 0.3);">
            <div class="card-body text-center p-4">
                <i class="bi bi-check-circle display-1 mb-3"></i>
                <h3 class="fw-bold mb-2">{{ $confirmedBooking }}</h3>
                <p class="mb-0">Confirmed</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white h-100" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); box-shadow: 0 10px 30px rgba(250, 112, 154, 0.3);">
            <div class="card-body text-center p-4">
                <i class="bi bi-x-circle display-1 mb-3"></i>
                <h3 class="fw-bold mb-2">{{ $cancelledBooking }}</h3>
                <p class="mb-0">Cancelled</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <a href="{{ route('user.rooms.index') }}" class="text-decoration-none">
            <div class="card h-100 text-center hover-card">
                <div class="card-body p-5">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-door-open display-4 text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Ruangan Studio</h4>
                    <p class="text-muted mb-3">Lihat dan pilih ruangan studio yang tersedia</p>
                    <span class="btn btn-primary">Lihat Ruangan <i class="bi bi-arrow-right"></i></span>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-4">
        <a href="{{ route('user.booking.history') }}" class="text-decoration-none">
            <div class="card h-100 text-center hover-card">
                <div class="card-body p-5">
                    <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-clock-history display-4 text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Riwayat Booking</h4>
                    <p class="text-muted mb-3">Cek semua booking yang pernah dibuat</p>
                    <span class="btn btn-success">Lihat Riwayat <i class="bi bi-arrow-right"></i></span>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-md-4">
        <a href="{{ route('user.profile') }}" class="text-decoration-none">
            <div class="card h-100 text-center hover-card">
                <div class="card-body p-5">
                    <div class="rounded-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-person-circle display-4 text-info"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Profil Saya</h4>
                    <p class="text-muted mb-3">Kelola informasi akun Anda</p>
                    <span class="btn btn-info text-white">Lihat Profil <i class="bi bi-arrow-right"></i></span>
                </div>
            </div>
        </a>
    </div>
</div>

<style>
.hover-card {
    transition: all 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2) !important;
}
</style>
@endsection
