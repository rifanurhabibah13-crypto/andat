@extends('layouts.main')

@section('title','User Dashboard')

@section('content')
    <h2>User Dashboard</h2>
    <ul>
        <li><a href="{{ route('user.rooms.index') }}">Rooms</a></li>
        <li><a href="{{ route('user.booking.history') }}">My Bookings</a></li>
        <li><a href="{{ route('user.profile') }}">Profile</a></li>
    </ul>
@endsection
