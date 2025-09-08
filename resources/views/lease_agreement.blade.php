@extends('layout.tenantapply')

@section('title', 'Lease Agreement')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
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

&nbsp

    <div class="alert alert-info">
        <p>
            Congratulations, {{ Auth::user()->name }}! <br>
            Your application has been approved. <br>
            To continue, please visit the Manager’s office to sign your Lease Agreement.
        </p>
    </div>

    <div class="card p-4 shadow-sm">
        <h5>Next Steps:</h5>
        <ul>
            <li>Visit the property manager to sign your Lease Agreement.</li>
            <li>You may also <b>download</b> a copy of the Lease Agreement form below.</li>
            <li>If already signed, you can <b>upload</b> the scanned signed copy.</li>
        </ul>

        <div class="mt-3">
            <a href="{{ asset('docs/lease_agreement_template.pdf') }}" class="btn btn-outline-primary">
                <i class="bi bi-download"></i> Download Lease Agreement
            </a>

            <form action="{{ route('lease.upload') }}" method="POST" enctype="multipart/form-data" class="d-inline-block ms-3">
                @csrf
                <input type="file" name="lease_file" class="form-control d-inline-block w-auto" required>
                <button type="submit" class="btn btn-success mt-2">
                    <i class="bi bi-upload"></i> Upload Signed Copy
                </button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        {{-- This button stays disabled until lease is signed --}}
        <button class="btn btn-secondary" disabled>Go to Dashboard (Locked until Lease Signed)</button>
    </div>
</div>
@endsection
