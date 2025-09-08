<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document Templates</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/settings.css">
</head>
<body>
  <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand mb-0" href="#">Rent-All</a>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="col-md-10 p-4">
      <h3 class="fw-bold mb-4">User Account & Security</h3>

      <!-- Back Button -->
      <a href="setting" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left me-2"></i> Back to Settings
      </a>

        <!-- Profile Info -->
        <div class="col-md-6 mb-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="fw-bold mb-3">Update Profile</h5>
              <form>
                <div class="mb-3">
                  <label class="form-label">Full Name</label>
                  <input type="text" class="form-control" value="Juan Dela Cruz">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" value="juan@email.com">
                </div>
                <button class="btn btn-primary">Save Changes</button>
              </form>
            </div>
          </div>
        </div>

        <!-- Password Reset -->
        <div class="col-md-6 mb-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="fw-bold mb-3">Change Password</h5>
              <form>
                <div class="mb-3">
                  <label class="form-label">Current Password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">New Password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Confirm Password</label>
                  <input type="password" class="form-control">
                </div>
                <button class="btn btn-warning">Update Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
</html>