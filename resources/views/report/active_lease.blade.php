@extends('layout.app')

@section('content')
<h1>Active Leases Report - {{ $month }} {{ $year }}</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Lease ID</th>
            <th>Tenant</th>
            <th>Property</th>
            <th>Room Number</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($active_leases as $lease)
        <tr>
            <td>{{ $lease->id }}</td>
            <td>{{ $lease->tenant_name }}</td>
            <td>{{ $lease->property_type }}</td>
            <td>{{ $lease->room_number }}</td>
            <td>{{ $lease->status }}</td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center">No active leases found</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
