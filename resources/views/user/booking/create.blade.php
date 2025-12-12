@extends('layouts.main')

@section('title','Create Booking')
@section('content')
<div class="container">
    <h2>Create Booking</h2>
    <form method="POST" action="{{ route('user.booking.store') }}">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room? $room->id : '' }}">
        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" required>
        </div>
        <div class="form-group">
            <label>Start time</label>
            <input type="time" name="start_time" required>
        </div>
        <div class="form-group">
            <label>End time</label>
            <input type="time" name="end_time" required>
        </div>
        <div class="form-group">
            <label>Service (optional)</label>
            <input name="service">
        </div>
        <div class="form-group">
            <label>Notes</label>
            <textarea name="notes"></textarea>
        </div>
        <button type="submit">Book</button>
    </form>
</div>
@endsection
