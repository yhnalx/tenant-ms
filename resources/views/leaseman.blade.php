@extends('layout.leaseman')

@section('title', 'Lease Management')

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
  <h3 class="text-center mb-4">Lease</h3>
<hr>
  {{-- Pending Applications Table --}}
  <h3>Pending Applications</h3>
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>Applicant Name</th>
              <th>Preferred Unit</th>
              <th>Status</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          @forelse($applications as $app)
          <tr>
              <td>{{ $app->full_name }}</td>
              <td>{{ $app->preferred_unit_type ?? 'N/A' }}</td>
              <td>
                  @if($app->status == 'approved')
                      <span class="badge bg-success">Approved</span>
                  @elseif($app->status == 'rejected')
                      <span class="badge bg-danger">Rejected</span>
                  @else
                      <span class="badge bg-warning">Pending</span>
                  @endif
              </td>
             <td class="d-flex gap-2">
    @if($app->status == 'pending')
        <!-- Approve button -->
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#approveModal{{ $app->id }}">
            Approve
        </button>

        <!-- Reject button -->
        <form action="{{ route('leaseman.reject', $app->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
        </form>

        <!-- Approve Modal -->
        <div class="modal fade" id="approveModal{{ $app->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $app->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('leaseman.approve', $app->id) }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{ $app->id }}">Approve Tenant</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <label>Choose Room Number:</label>
                            <select name="room_number" class="form-select" required>
                                @foreach($availableRooms as $room)
                                    <option value="{{ $room }}">{{ $room }}</option>
                                @endforeach
                            </select>

                            <label class="mt-3">Lease Start:</label>
                            <input type="date" name="lease_start" class="form-control" value="{{ date('Y-m-d') }}" required>

                            <label class="mt-3">Lease End:</label>
                            <input type="date" name="lease_end" class="form-control" value="{{ date('Y-m-d', strtotime('+1 year')) }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @else
        <!-- Delete button for approved/rejected -->
        <form action="{{ route('leaseman.destroyApplication', $app->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark btn-sm">Delete</button>
        </form>
    @endif
</td>

          </tr>
          @empty
          <tr>
              <td colspan="4" class="text-center">No applications found</td>
          </tr>
          @endforelse
      </tbody>
  </table>
</div>
@endsection
