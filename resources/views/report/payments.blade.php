@extends('layout.app')

@section('content')
<h1>Payment Report - {{ $month }} {{ $year }}</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Payment ID</th>
            <th>Tenant</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Method</th>
        </tr>
    </thead>
    <tbody>
        @forelse($payments as $payment)
        <tr>
            <td>{{ $payment->id }}</td>
            <td>{{ $payment->tenant_name }}</td>
            <td>{{ $payment->amount }}</td>
            <td>{{ $payment->payment_date }}</td>
            <td>{{ $payment->method }}</td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center">No payments found</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
