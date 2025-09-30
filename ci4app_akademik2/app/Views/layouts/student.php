<!DOCTYPE html>
<html>
<head>
  <title>Student Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
    }
    .sidebar {
      width: 220px;
      background: #0d6efd;
      color: white;
      padding: 20px;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 8px;
      margin-bottom: 5px;
      border-radius: 5px;
    }
    .sidebar a:hover {
      background: #0b5ed7;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4>Student Panel</h4>
    <hr>
    <a href="<?= base_url('student/dashboard') ?>">Dashboard</a>
    <a href="<?= base_url('student/courses') ?>">Daftar Mata Kuliah</a>
    <a href="<?= base_url('student/mycourses') ?>">KRS Saya</a>
    <a href="<?= base_url('logout') ?>" class="text-warning">Logout</a>
  </div>

  <!-- Content -->
  <div class="content">

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
