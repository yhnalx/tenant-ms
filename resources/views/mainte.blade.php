@extends('layout.mainte')

@section('title', 'Maintenance Requests')

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

<main id="mainContent" class="p-4">
  <h3 class="text-center mb-4">Maintenance Requests</h3>
  <hr>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-striped mt-4">
    <thead>
      <tr>
        <th>Tenant</th>
        <th>Title</th>
        <th>Description</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Date Submitted</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($requests ?? [] as $req)
      <tr>
        <td>{{ $req->tenant->name ?? 'Unknown' }}</td>
        <td>{{ $req->title }}</td>
        <td>{{ $req->description }}</td>
        <td>{{ $req->priority }}</td>
        <td>{{ $req->status }}</td>
        <td>{{ $req->created_at->format('M d, Y') }}</td>
        <td>
            <!-- Approve -->
            <form action="{{ route('manager.maintenance.update', $req->id) }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="status" value="Approved">
                <button type="submit" class="btn btn-success btn-sm">Approve</button>
            </form>

            <!-- Reject -->
            <form action="{{ route('manager.maintenance.update', $req->id) }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="status" value="Rejected">
                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
            </form>

            <!-- View Proof Image -->
            @if($req->proof_image)
              <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewRequestModal{{ $req->id }}">
                View Proof
              </button>
            @endif
        </td>
      </tr>

      <!-- Modal for Proof Image -->
      @if($req->proof_image)
      <div class="modal fade" id="viewRequestModal{{ $req->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Maintenance Request Proof</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
              <img src="{{ asset('storage/' . $req->proof_image) }}" class="img-fluid">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      @endif

      @empty
      <tr>
        <td colspan="7" class="text-center">No requests found</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</main>
@endsection
