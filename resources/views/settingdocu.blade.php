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
      <h3 class="fw-bold mb-4">Document Templates</h3>

      <!-- Back Button -->
      <a href="setting" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left me-2"></i> Back to Settings
      </a>

      <!-- Upload New Template -->
      <div class="card p-3 mb-4 shadow-sm">
        <h5>Upload Template</h5>
        <form>
          <div class="mb-3">
            <label class="form-label">Template Name</label>
            <input type="text" class="form-control" placeholder="e.g. Lease Agreement">
          </div>
          <div class="mb-3">
            <label class="form-label">Upload File</label>
            <input type="file" class="form-control">
          </div>
          <button class="btn btn-primary">Upload</button>
        </form>
      </div>

      <!-- List of Templates -->
      <div class="card p-3 shadow-sm">
        <h5>Available Templates</h5>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Lease Agreement.docx
            <div>
              <button class="btn btn-sm btn-info">Preview</button>
              <button class="btn btn-sm btn-danger">Delete</button>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
