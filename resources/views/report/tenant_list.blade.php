@extends('layout.app')

@section('title', 'Tenant List Report')

@section('content')
<h1 class="mb-4">Tenant List Report - {{ $month }} {{ $year }}</h1>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Property</th>
            <th>Room Number</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tenants as $tenant)
            <tr>
                <td>{{ $tenant->id }}</td>
                <td>{{ $tenant->name }}</td>
                <td>{{ $tenant->email }}</td>
                <td>{{ $tenant->property_type }}</td>
                <td>{{ $tenant->room_number }}</td>
                <td>{{ $tenant->status }}</td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">No tenants found</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
