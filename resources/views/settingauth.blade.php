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
      <h3 class="fw-bold mb-4">Audit Logs</h3>

      <!-- Back Button -->
      <a href="setting" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left me-2"></i> Back to Settings
      </a>

      <div class="card shadow-sm">
        <div class="card-body">
          <table class="table table-striped">
            <thead class="table-dark">
              <tr>
                <th>User</th>
                <th>Action</th>
                <th>Module</th>
                <th>Date & Time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Manager01</td>
                <td>Updated payment settings</td>
                <td>Payment</td>
                <td>2025-08-19 14:35</td>
              </tr>
              <tr>
                <td>Manager02</td>
                <td>Edited document template</td>
                <td>Documents</td>
                <td>2025-08-18 09:20</td>
              </tr>
              <tr>
                <td>Staff01</td>
                <td>Viewed tenant details</td>
                <td>Tenant</td>
                <td>2025-08-17 16:05</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</html>