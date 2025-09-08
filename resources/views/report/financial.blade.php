@extends('layout.app')

@section('content')
<h1>Financial Report - {{ $month }} {{ $year }}</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tenant</th>
            <th>Total Payments</th>
            <th>Total Deposits</th>
            <th>Outstanding Balance</th>
        </tr>
    </thead>
    <tbody>
        @forelse($financials as $financial)
        <tr>
            <td>{{ $financial->tenant_name }}</td>
            <td>{{ $financial->total_payments }}</td>
            <td>{{ $financial->total_deposits }}</td>
            <td>{{ $financial->balance }}</td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">No financial records found</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
