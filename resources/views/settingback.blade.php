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
  
        <div class="card shadow-sm mb-4">
        <div class="card-body">
          <h5 class="fw-bold">Export Data</h5>
          <p class="text-muted">Download data in different formats:</p>
          <button class="btn btn-outline-success me-2">Export CSV</button>
          <button class="btn btn-outline-info me-2">Export Excel</button>
          <button class="btn btn-outline-danger">Export PDF</button>
        </div>
      </div>

      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="fw-bold">System Backup</h5>
          <p class="text-muted">Download a full backup of the database.</p>
          <button class="btn btn-primary">Download Backup</button>
        </div>
      </div>
    </div>
  </div>
</html>