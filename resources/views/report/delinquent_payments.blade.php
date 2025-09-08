@extends('layout.app')

@section('content')
<h1>Delinquent Payments Report - {{ $month }} {{ $year }}</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tenant</th>
            <th>Amount Due</th>
            <th>Due Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($delinquents as $delinquent)
        <tr>
            <td>{{ $delinquent->tenant_name }}</td>
            <td>{{ $delinquent->amount_due }}</td>
            <td>{{ $delinquent->due_date }}</td>
        </tr>
        @empty
        <tr><td colspan="3" class="text-center">No delinquent payments found</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
