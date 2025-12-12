@extends('layouts.admin')
@section('title','Transactions')
@section('content')
<div class="container">
    <h2>Transactions</h2>
    <table class="table">
        <thead><tr><th>Booking</th><th>Amount</th><th>Status</th></tr></thead>
        <tbody>
        @foreach($transactions ?? [] as $t)
            <tr>
                <td>#{{ $t->booking_id }}</td>
                <td>{{ $t->amount }}</td>
                <td>{{ $t->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
