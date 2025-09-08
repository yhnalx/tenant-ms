@extends('layout.tenantregister')

@section('title', 'Apply as a Tenant!')
@push('styles')
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10 shadow rounded p-4 bg-white">
      <div class="row">

        <!-- Requirements -->
        <div class="col-md-5 border-end">
          <h4 class="mb-3">📋 Requirements</h4>
          <ul class="list-group">
            <li class="list-group-item">✔️ Valid Government-issued ID</li>
            <li class="list-group-item">✔️ 1x1 ID Picture</li>
            <li class="list-group-item">✔️ Emergency Contact Information</li>
            <li class="list-group-item">✔️ Employment or School Details</li>
          </ul>
        </div>

        <!-- Tenant Application Form -->
        <div class="col-md-7">
          <h4 class="mb-3">📝 Tenant Application Form</h4>

          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

         <form method="POST" action="{{ route('tenantregister.submit') }}" enctype="multipart/form-data">



            @csrf

            <div class="mb-3">
              <label for="full_name">Full Name</label>
              <input type="text" name="full_name" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="text">Contact Number</label>
              <input type="text" name="contact_number" class="form-control" required>
            </div>


            <div class="mb-3">
              <label for="current_address">Current Address</label>
              <textarea name="current_address" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
              <label for="birthdate">Birthdate</label>
              <input type="date" name="birthdate" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="preferred_unit_type">Preferred Unit Type</label>
              <select name="preferred_unit_type" class="form-select" required>
                <option value="studio">Studio</option>
                <option value="1-bedroom">1 Bedroom</option>
                <option value="2-bedroom">2 Bedroom</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="preferred_movein_date">Preferred Move-in Date</label>
              <input type="date" name="preferred_movein_date" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="reason_renting">Reason for Renting</label>
              <textarea name="reason_renting" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
              <label for="employment_status">Employment Status</label>
              <select name="employment_status" class="form-select" required>
                <option value="employed">Employed</option>
                <option value="self-employed">Self-employed</option>
                <option value="student">Student</option>
                <option value="unemployed">Unemployed</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="employer_name">Employer or School</label>
              <input type="text" name="employer_name" class="form-control">
            </div>

            <div class="mb-3">
              <label for="emergency_name">Emergency Contact Name</label>
              <input type="text" name="emergency_name" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="emergency_contact">Emergency Contact Number</label>
              <input type="text" name="emergency_contact" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="emergency_relationship">Relationship</label>
              <input type="text" name="emergency_relationship" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="id_picture">Valid ID</label>
              <input type="file" name="id_picture" accept=".jpg,.jpeg,.png,.pdf" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="photo">1x1 ID Picture</label>
              <input type="file" name="photo" accept=".jpg,.jpeg,.png" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit Application</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
