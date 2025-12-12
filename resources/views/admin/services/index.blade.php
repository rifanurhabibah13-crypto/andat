@extends('layouts.admin')
@section('title','Services')
@section('content')
<div class="container">
    <h2>Services</h2>
    <table class="table">
        <thead><tr><th>Name</th><th>Price</th></tr></thead>
        <tbody>
        @foreach($services ?? [] as $s)
            <tr><td>{{ $s->name }}</td><td>{{ $s->price }}</td></tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
