@extends('layouts.admin')
@section('title','Users')
@section('content')
<div class="container">
    <h2>Users</h2>
    <table class="table">
        <thead><tr><th>Name</th><th>Email</th><th>Role</th><th></th></tr></thead>
        <tbody>
        @foreach($users ?? [] as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->role }}</td>
                <td><a href="#">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
