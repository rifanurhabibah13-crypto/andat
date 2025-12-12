@extends('layouts.main')

@section('title','Register')

@section('content')
    <h2>Register</h2>
    @if($errors->any())
        <div style="color:red">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
@endsection
