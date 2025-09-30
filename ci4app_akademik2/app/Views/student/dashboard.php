<?= $this->extend('layouts/student') ?>
<?= $this->section('content') ?>

<div class="container-fluid mt-4">
  <h3 class="mb-4">Halo, <?= $studentName ?> 👋</h3>
  <p>Selamat datang di Dashboard Mahasiswa.</p>

  <div class="row mt-4">
    <div class="col-md-6 mb-3">
      <div class="card shadow border-0">
        <div class="card-body text-center bg-success text-white rounded">
          <h5>Mata Kuliah yang Diambil</h5>
          <h2><?= $totalTaken ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
