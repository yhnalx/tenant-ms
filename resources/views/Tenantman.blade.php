@extends('layout.tenantman')

@section('title', 'Tenant Management')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>
@endpush

@section('content')
<nav class="navbar">
    <div class="container-fluid d-flex align-items-center">
        <button id="sidebarToggle" aria-label="Toggle sidebar" class="btn btn-link">
            <i class="bi bi-list"></i>
        </button>
        <a class="navbar-brand mb-0" href="#">Rent-All</a>
    </div>
</nav>

<main id="mainContent" class="p-4">
    <h3 class="text-center mb-4">Tenant Management</h3>
    <hr>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Pending Applications --}}
    <h4 class="mb-3">Pending Applications</h4>
    <table class="table table-bordered table-striped mb-5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Preferred Unit</th>
                <th>Move-in Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications ?? [] as $application)
            <tr>
                <td>{{ $application->full_name }}</td>
                <td>{{ $application->email }}</td>
                <td>{{ $application->contact_number }}</td>
                <td>{{ $application->preferred_unit_type }}</td>
                <td>{{ \Carbon\Carbon::parse($application->preferred_movein_date)->format('M d, Y') }}</td>
                <td>
                    <form action="{{ route('leaseman.approve', $application->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                    </form>

                    <form action="{{ route('leaseman.reject', $application->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No pending applications</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Approved Tenants --}}
    <h4 class="mb-3">Approved Tenants</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Room Number</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Lease Start</th>
                <th>Lease End</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tenants ?? [] as $tenant)
            <tr>
                <td>{{ $tenant->tenant_name }}</td>
                <td>{{ $tenant->email }}</td>
                <td>{{ $tenant->room_number }}</td>
                <td>{{ $tenant->contact_number }}</td>
                <td>{{ ucfirst($tenant->status) }}</td>
                <td>{{ \Carbon\Carbon::parse($tenant->lease_start)->format('M d, Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($tenant->lease_end)->format('M d, Y') }}</td>
                <td>
                    <form action="{{ route('tenantman.destroy', $tenant->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tenant?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No approved tenants</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</main>
@endsection
