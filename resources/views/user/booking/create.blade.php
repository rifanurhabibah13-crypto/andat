@extends('layouts.main')

@section('title','Buat Booking')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-calendar-plus"></i> Buat Booking Baru</h4>
            </div>
            <div class="card-body p-4">
                @if($room)
                <div class="alert alert-info mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong><i class="bi bi-door-open"></i> {{ $room->name }}</strong>
                            <div class="small">Kapasitas: {{ $room->capacity }} orang</div>
                        </div>
                        <div class="text-end">
                            <h5 class="mb-0">Rp {{ number_format($room->price_per_hour, 0, ',', '.') }}</h5>
                            <small>per jam</small>
                        </div>
                    </div>
                </div>
                @endif

                <form method="POST" action="{{ route('user.booking.store') }}">
                    @csrf
                    
                    <div class="row g-3">
                        @if(!$room)
                        <div class="col-md-12">
                            <label class="form-label fw-bold"><i class="bi bi-door-open"></i> Pilih Ruangan</label>
                            <select name="room_id" class="form-select form-select-lg @error('room_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Ruangan --</option>
                                @foreach(\App\Models\Room::all() as $r)
                                    <option value="{{ $r->id }}" {{ old('room_id') == $r->id ? 'selected' : '' }}>
                                        {{ $r->name }} - Rp {{ number_format($r->price_per_hour, 0, ',', '.') }}/jam
                                    </option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @else
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        @endif
                        
                        <div class="col-md-12">
                            <label class="form-label fw-bold"><i class="bi bi-calendar3"></i> Tanggal</label>
                            <input type="date" name="date" class="form-control form-control-lg @error('date') is-invalid @enderror" 
                                   value="{{ old('date') }}" required min="{{ date('Y-m-d') }}">
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label fw-bold"><i class="bi bi-clock"></i> Jam Mulai</label>
                            <input type="time" name="start_time" class="form-control form-control-lg @error('start_time') is-invalid @enderror" 
                                   value="{{ old('start_time') }}" required>
                            @error('start_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label fw-bold"><i class="bi bi-clock-history"></i> Jam Selesai</label>
                            <input type="time" name="end_time" class="form-control form-control-lg @error('end_time') is-invalid @enderror" 
                                   value="{{ old('end_time') }}" required>
                            @error('end_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label fw-bold"><i class="bi bi-gear"></i> Layanan Tambahan (Opsional)</label>
                            <input type="text" name="service" class="form-control @error('service') is-invalid @enderror" 
                                   value="{{ old('service') }}" placeholder="Contoh: Sound engineer, Mixing & Mastering">
                            @error('service')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label fw-bold"><i class="bi bi-chat-left-text"></i> Catatan</label>
                            <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" 
                                      rows="4" placeholder="Tambahkan catatan atau permintaan khusus...">{{ old('notes') }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-lg flex-grow-1">
                            <i class="bi bi-check-circle"></i> Konfirmasi Booking
                        </button>
                        <a href="{{ $room ? route('user.rooms.show', $room->id) : route('user.rooms.index') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
