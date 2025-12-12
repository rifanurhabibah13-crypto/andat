@extends('layouts.main')

@section('title','Room')
@section('content')
<div class="container">
    <h2>{{ $room->name }}</h2>
    <p>{{ $room->description }}</p>
    <p>Capacity: {{ $room->capacity }}</p>
    <p>Price/hour: {{ $room->price_per_hour }}</p>
    <a href="{{ route('user.booking.create', $room->id) }}">Book this room</a>
</div>
@endsection
