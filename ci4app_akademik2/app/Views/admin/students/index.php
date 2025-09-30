<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="container mt-4">

  <div class="card shadow">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Daftar Mahasiswa</h5>
      <a href="<?= base_url('admin/students/create') ?>" class="btn btn-light btn-sm">+ Tambah Mahasiswa</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Semester</th>
              <th>Username</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($students as $s): ?>
              <tr>
                <td><?= $s['student_id'] ?></td>
                <td><?= $s['nim'] ?></td>
                <td><?= $s['full_name'] ?></td>
                <td><?= $s['kelas'] ?></td>
                <td><?= $s['semester'] ?></td>
                <td><?= $s['username'] ?></td>
                <td>
                  <a href="<?= base_url('admin/students/edit/'.$s['student_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="<?= base_url('admin/students/delete/'.$s['student_id']) ?>" 
                     class="btn btn-danger btn-sm"
                     onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<?= $this->endSection() ?>
