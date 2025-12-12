@extends('layouts.main')

@section('title','Profile')
@section('content')
<div class="container">
    <h2>Profile</h2>
    @if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
    <form method="POST" action="{{ route('user.profile.update') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input name="phone" value="{{ $user->phone }}">
        </div>
        <div class="form-group">
            <label>New Password (leave blank to keep)</label>
            <input type="password" name="password">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation">
        </div>
        <button type="submit">Update Profile</button>
    </form>
</div>
@endsection
