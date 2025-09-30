<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid mt-4">
  <h3 class="mb-4">Dashboard Admin</h3>
  <div class="row">
    <div class="col-md-6 mb-3">
      <div class="card shadow border-0">
        <div class="card-body text-center bg-primary text-white rounded">
          <h5>Total Mahasiswa</h5>
          <h2><?= $totalStudents ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card shadow border-0">
        <div class="card-body text-center bg-success text-white rounded">
          <h5>Total Mata Kuliah</h5>
          <h2><?= $totalCourses ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
