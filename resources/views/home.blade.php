@extends('layouts.main')

@section('title','Home')

@section('content')
    <h2>Welcome to Studio Musik</h2>
    <p><a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a></p>
@endsection
