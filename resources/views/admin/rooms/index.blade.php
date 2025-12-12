@extends('layouts.admin')
@section('title','Admin Rooms')
@section('content')
<div class="container">
    <h2>Rooms (Admin)</h2>
    <a href="#">Create Room</a>
    <table class="table">
        <thead><tr><th>Name</th><th>Capacity</th><th>Price</th><th></th></tr></thead>
        <tbody>
        @foreach($rooms ?? [] as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->price_per_hour }}</td>
                <td><a href="#">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
