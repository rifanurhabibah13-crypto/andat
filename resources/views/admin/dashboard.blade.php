@extends('layouts.admin')

@section('title','Admin Dashboard')

@section('content')
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="{{ route('admin.rooms.index') }}">Rooms</a></li>
        <li><a href="{{ route('admin.services.index') }}">Services</a></li>
        <li><a href="{{ route('admin.bookings.index') }}">Bookings</a></li>
        <li><a href="{{ route('admin.transactions.index') }}">Transactions</a></li>
        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
    </ul>
@endsection
