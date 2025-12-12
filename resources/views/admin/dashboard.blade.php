@extends('layouts.admin')

@section('title','Admin Dashboard')

@section('content')
<div class="header-card">
    <h2 class="fw-bold mb-0"><i class="bi bi-speedometer2"></i> Dashboard</h2>
    <p class="text-muted mb-0">Selamat datang di Admin Panel Studio Musik</p>
</div>

@php
    $totalRooms = \App\Models\Room::count();
    $totalBookings = \App\Models\Booking::count();
    $pendingBookings = \App\Models\Booking::where('status', 'pending')->count();
    $confirmedBookings = \App\Models\Booking::where('status', 'confirmed')->count();
    $totalUsers = \App\Models\User::where('role', 'user')->count();
    $totalServices = \App\Models\Service::count();
@endphp

<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="card text-white h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-2"><i class="bi bi-door-open"></i> Total Ruangan</h6>
                        <h2 class="fw-bold mb-0">{{ $totalRooms }}</h2>
                        <small class="text-white-50">Ruangan tersedia</small>
                    </div>
                    <div class="fs-1 opacity-75">
                        <i class="bi bi-door-open"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card text-white h-100" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); box-shadow: 0 10px 30px rgba(240, 147, 251, 0.3);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-2"><i class="bi bi-calendar-check"></i> Total Booking</h6>
                        <h2 class="fw-bold mb-0">{{ $totalBookings }}</h2>
                        <small class="text-white-50">{{ $pendingBookings }} pending</small>
                    </div>
                    <div class="fs-1 opacity-75">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card text-white h-100" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); box-shadow: 0 10px 30px rgba(79, 172, 254, 0.3);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-2"><i class="bi bi-people"></i> Total Users</h6>
                        <h2 class="fw-bold mb-0">{{ $totalUsers }}</h2>
                        <small class="text-white-50">Member terdaftar</small>
                    </div>
                    <div class="fs-1 opacity-75">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card text-white h-100" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); box-shadow: 0 10px 30px rgba(67, 233, 123, 0.3);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-2"><i class="bi bi-gear"></i> Total Layanan</h6>
                        <h2 class="fw-bold mb-0">{{ $totalServices }}</h2>
                        <small class="text-white-50">Layanan tersedia</small>
                    </div>
                    <div class="fs-1 opacity-75">
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
                    @forelse(\App\Models\Booking::with('user', 'room')->latest()->take(5)->get() as $booking)
                    <div class="list-group-item px-0">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <i class="bi bi-person-circle text-primary"></i> 
                                    {{ $booking->user ? $booking->user->name : 'User tidak ditemukan' }}
                                </h6>
                                <small class="text-muted">
                                    <i class="bi bi-door-open"></i> {{ $booking->room ? $booking->room->name : '-' }} 
                                    <br>
                                    <i class="bi bi-calendar3"></i> {{ $booking->date ? date('d M Y', strtotime($booking->date)) : '-' }}
                                </small>
                            </div>
                            <div>
                                @if($booking->status == 'pending')
                                    <span class="badge bg-warning"><i class="bi bi-hourglass-split"></i> Pending</span>
                                @elseif($booking->status == 'confirmed')
                                    <span class="badge bg-success"><i class="bi bi-check-circle"></i> Confirmed</span>
                                @elseif($booking->status == 'cancelled')
                                    <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Cancelled</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($booking->status) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-muted">
                        <i class="bi bi-inbox display-4"></i>
                        <p class="mt-2">Belum ada booking</p>
                    </div>
                    @endforelse
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary w-100 mt-3">
                    <i class="bi bi-arrow-right-circle"></i> Lihat Semua Booking
                </a>
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
