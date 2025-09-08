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
      <h3 class="fw-bold mb-4">Notification Settings</h3>

      <!-- Back Button -->
      <a href="setting" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left me-2"></i> Back to Settings
      </a>
          <div class="mb-3">
            <label class="form-label">Send Reminders Via</label>
            <select class="form-select">
              <option>Email</option>
              <option>SMS</option>
              <option>Both</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Default Rent Reminder</label>
            <select class="form-select">
              <option>3 days before</option>
              <option>5 days before</option>
              <option>7 days before</option>
            </select>
          </div>
          <button class="btn btn-primary">Save Settings</button>
        </form>
      </div>

      <!-- Announcements -->
      <div class="card p-3 shadow-sm">
        <h5>Announcements</h5>
        <form>
          <textarea class="form-control mb-2" rows="3" placeholder="Write announcement here..."></textarea>
          <button class="btn btn-success">Post Announcement</button>
        </form>
      </div>
    </div>
  </div>
</html>