@extends('layout.reports')

@section('title', 'Reports')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/table.css') }}">
  <script src="{{ asset('js/sidebar.js') }}"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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

&nbsp
<!-- Main Content -->
<main id="mainContent" class="p-4">
  <h2 class="text-center mb-4">Reports</h2>
  <hr>

  <div class="search-bar-wrapper">
    <input type="text" class="search-input" placeholder="Search...">
    <button class="search-btn">🔍</button>
  </div>

  <table class="table table-bordered table-striped mt-4">
    <thead class="table-dark text-center">
      <tr>
        <th>Report Type</th>
        <th>Generated Date</th>
        <th>Period Covered</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="text-center align-middle">
      <tr>
        <td>Tenant List Report</td>
        <td>{{ now()->format('M d, Y') }}</td>
        <td>{{ now()->format('F Y') }}</td>
        <td>
          <a href="{{ route('reports.tenants') }}" class="btn btn-sm btn-primary">View</a>
          <a href="{{ route('reports.export', 'tenants') }}" class="btn btn-sm btn-success">Export</a>
        </td>
      </tr>
      <tr>
        <td>Active Leases Report</td>
        <td>{{ now()->format('M d, Y') }}</td>
        <td>{{ now()->format('F Y') }}</td>
        <td>
          <a href="{{ route('reports.leases') }}" class="btn btn-sm btn-primary">View</a>
          <a href="{{ route('reports.export', 'leases') }}" class="btn btn-sm btn-success">Export</a>
        </td>
      </tr>
      <tr>
        <td>Payment Report</td>
        <td>{{ now()->format('M d, Y') }}</td>
        <td>{{ now()->format('F Y') }}</td>
        <td>
          <a href="{{ route('reports.payments') }}" class="btn btn-sm btn-primary">View</a>
          <a href="{{ route('reports.export', 'payments') }}" class="btn btn-sm btn-success">Export</a>
        </td>
      </tr>
      <tr>
        <td>Deposit Report</td>
        <td>{{ now()->format('M d, Y') }}</td>
        <td>{{ now()->format('F Y') }}</td>
        <td>
          <a href="{{ route('reports.deposits') }}" class="btn btn-sm btn-primary">View</a>
          <a href="{{ route('reports.export', 'deposits') }}" class="btn btn-sm btn-success">Export</a>
        </td>
      </tr>
      <tr>
        <td>Maintenance Report</td>
        <td>{{ now()->format('M d, Y') }}</td>
        <td>{{ now()->format('F Y') }}</td>
        <td>
          <a href="{{ route('reports.maintenance') }}" class="btn btn-sm btn-primary">View</a>
          <a href="{{ route('reports.export', 'maintenance') }}" class="btn btn-sm btn-success">Export</a>
        </td>
      </tr>
      <tr>
        <td>Occupancy Report</td>
        <td>{{ now()->format('M d, Y') }}</td>
        <td>{{ now()->format('F Y') }}</td>
        <td>
          <a href="{{ route('reports.occupancy') }}" class="btn btn-sm btn-primary">View</a>
          <a href="{{ route('reports.export', 'occupancy') }}" class="btn btn-sm btn-success">Export</a>
        </td>
      </tr>
      <tr>
        <td>Financial Report</td>
        <td>{{ now()->format('M d, Y') }}</td>
        <td>{{ now()->format('F Y') }}</td>
        <td>
          <a href="{{ route('reports.financial') }}" class="btn btn-sm btn-primary">View</a>
          <a href="{{ route('reports.export', 'financial') }}" class="btn btn-sm btn-success">Export</a>
        </td>
      </tr>
      <tr>
        <td>Expiring Leases Report</td>
        <td>{{ now()->format('M d, Y') }}</td>
        <td>{{ now()->format('F Y') }}</td>
        <td>
          <a href="{{ route('reports.expiring') }}" class="btn btn-sm btn-primary">View</a>
          <a href="{{ route('reports.export', 'expiring') }}" class="btn btn-sm btn-success">Export</a>
        </td>
      </tr>
      <tr>
        <td>Delinquent Payments Report</td>
        <td>{{ now()->format('M d, Y') }}</td>
        <td>{{ now()->format('F Y') }}</td>
        <td>
          <a href="{{ route('reports.delinquent') }}" class="btn btn-sm btn-primary">View</a>
          <a href="{{ route('reports.export', 'delinquent') }}" class="btn btn-sm btn-success">Export</a>
        </td>
      </tr>
    </tbody>
  </table>
</main>
@endsection
