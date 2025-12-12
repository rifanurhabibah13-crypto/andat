@extends('layouts.main')

@section('title','Rooms')
@section('content')
<div class="container">
    <h2>Rooms</h2>
    <table class="table">
        <thead><tr><th>Name</th><th>Capacity</th><th>Price/Hour</th><th></th></tr></thead>
        <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->price_per_hour }}</td>
                <td><a href="{{ route('user.rooms.show', $room->id) }}">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
