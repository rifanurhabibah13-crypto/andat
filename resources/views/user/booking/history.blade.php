@extends('layouts.main')

@section('title','Booking History')
@section('content')
<div class="container">
    <h2>My Bookings</h2>
    <table class="table">
        <thead><tr><th>Room</th><th>Date</th><th>Time</th><th>Status</th></tr></thead>
        <tbody>
        @foreach($bookings as $b)
            <tr>
                <td>{{ optional($b->room)->name }}</td>
                <td>{{ $b->date }}</td>
                <td>{{ $b->start_time }} - {{ $b->end_time }}</td>
                <td>{{ $b->status }} / {{ $b->payment_status ?? 'unpaid' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
