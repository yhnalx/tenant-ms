@extends('layout.app')

@section('content')
<h1>Occupancy Report - {{ $month }} {{ $year }}</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Property</th>
            <th>Room Number</th>
            <th>Tenant</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($occupancies as $occupancy)
        <tr>
            <td>{{ $occupancy->property_type }}</td>
            <td>{{ $occupancy->room_number }}</td>
            <td>{{ $occupancy->tenant_name ?? 'Vacant' }}</td>
            <td>{{ $occupancy->status }}</td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">No occupancy data found</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
