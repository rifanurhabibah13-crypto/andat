@extends('layouts.admin')
@section('title','Bookings')
@section('content')
<div class="container">
    <h2>All Bookings</h2>
    <table class="table">
        <thead><tr><th>User</th><th>Room</th><th>Date</th><th>Time</th><th>Status</th></tr></thead>
        <tbody>
        @foreach($bookings ?? [] as $b)
            <tr>
                <td>{{ optional($b->user)->name }}</td>
                <td>{{ optional($b->room)->name }}</td>
                <td>{{ $b->date }}</td>
                <td>{{ $b->start_time }} - {{ $b->end_time }}</td>
                <td>{{ $b->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
