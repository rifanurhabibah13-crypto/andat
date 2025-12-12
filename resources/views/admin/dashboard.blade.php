@extends('layouts.admin')

@section('title','Admin Dashboard')

@section('content')
<div class="header-card">
    <h2 class="fw-bold mb-0"><i class="bi bi-speedometer2"></i> Dashboard</h2>
    <p class="text-muted mb-0">Selamat datang di Admin Panel Studio Musik</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="card text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-2">Total Ruangan</h6>
                        <h2 class="fw-bold mb-0">{{ \App\Models\Room::count() }}</h2>
                    </div>
                    <div class="fs-1">
                        <i class="bi bi-door-open"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card text-white" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-2">Total Booking</h6>
                        <h2 class="fw-bold mb-0">{{ \App\Models\Booking::count() }}</h2>
                    </div>
                    <div class="fs-1">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card text-white" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-2">Total Users</h6>
                        <h2 class="fw-bold mb-0">{{ \App\Models\User::count() }}</h2>
                    </div>
                    <div class="fs-1">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card text-white" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-2">Layanan</h6>
                        <h2 class="fw-bold mb-0">{{ \App\Models\Service::count() }}</h2>
                    </div>
                    <div class="fs-1">
                        <i class="bi bi-gear"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-bold"><i class="bi bi-clock-history"></i> Booking Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @foreach(\App\Models\Booking::with('user', 'room')->latest()->take(5)->get() as $booking)
                    <div class="list-group-item px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">{{ optional($booking->user)->name }}</h6>
                                <small class="text-muted">{{ optional($booking->room)->name }} - {{ date('d M Y', strtotime($booking->date)) }}</small>
                            </div>
                            @if($booking->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @else
                                <span class="badge bg-secondary">{{ $booking->status }}</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-primary w-100 mt-3">Lihat Semua Booking</a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-bold"><i class="bi bi-bar-chart"></i> Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.rooms.index') }}" class="btn btn-outline-primary btn-lg text-start">
                        <i class="bi bi-door-open"></i> Kelola Ruangan
                    </a>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-primary btn-lg text-start">
                        <i class="bi bi-calendar-check"></i> Kelola Booking
                    </a>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-primary btn-lg text-start">
                        <i class="bi bi-gear"></i> Kelola Layanan
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary btn-lg text-start">
                        <i class="bi bi-people"></i> Kelola Users
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
