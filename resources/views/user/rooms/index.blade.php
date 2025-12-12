@extends('layouts.main')

@section('title','Ruangan Studio')
@section('content')
<div class="mb-4">
    <h2 class="text-white fw-bold"><i class="bi bi-door-open"></i> Ruangan Studio Musik</h2>
    <p class="text-white-50">Pilih ruangan studio yang sesuai dengan kebutuhan Anda</p>
</div>

<div class="row g-4">
    @forelse($rooms as $room)
    <div class="col-md-6 col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h5 class="card-title fw-bold mb-0">{{ $room->name }}</h5>
                    <span class="badge bg-primary rounded-pill">{{ $room->capacity }} orang</span>
                </div>
                <p class="card-text text-muted">{{ Str::limit($room->description, 100) ?? 'Studio musik berkualitas dengan peralatan modern' }}</p>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <h4 class="mb-0 text-primary fw-bold">Rp {{ number_format($room->price_per_hour, 0, ',', '.') }}</h4>
                        <small class="text-muted">per jam</small>
                    </div>
                    <a href="{{ route('user.rooms.show', $room->id) }}" class="btn btn-primary">
                        <i class="bi bi-eye"></i> Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Belum ada ruangan tersedia.
        </div>
    </div>
    @endforelse
</div>
@endsection
