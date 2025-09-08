@extends('layout.app')

@section('content')
<h1>Deposit Report - {{ $month }} {{ $year }}</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Deposit ID</th>
            <th>Tenant</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($deposits as $deposit)
        <tr>
            <td>{{ $deposit->id }}</td>
            <td>{{ $deposit->tenant_name }}</td>
            <td>{{ $deposit->amount }}</td>
            <td>{{ $deposit->deposit_date }}</td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">No deposits found</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
