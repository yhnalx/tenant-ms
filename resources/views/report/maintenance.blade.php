@extends('layout.app')

@section('content')
<h1>Maintenance Report - {{ $month }} {{ $year }}</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tenant</th>
            <th>Property</th>
            <th>Request</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($maintenances as $maintenance)
        <tr>
            <td>{{ $maintenance->id }}</td>
            <td>{{ $maintenance->tenant_name }}</td>
            <td>{{ $maintenance->property_type }}</td>
            <td>{{ $maintenance->request_details }}</td>
            <td>{{ $maintenance->status }}</td>
            <td>{{ $maintenance->created_at }}</td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No maintenance requests found</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
