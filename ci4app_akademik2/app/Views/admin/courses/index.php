<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid mt-4">
  <div class="card shadow border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Daftar Mata Kuliah</h5>
      <a href="<?= base_url('admin/courses/create') ?>" class="btn btn-light btn-sm">+ Tambah Course</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($courses as $c): ?>
          <tr>
            <td><?= $c['course_id'] ?></td>
            <td><?= $c['course_code'] ?></td>
            <td><?= $c['course_name'] ?></td>
            <td><?= $c['credits'] ?></td>
            <td><?= $c['semester'] ?></td>
            <td>
              <a href="<?= base_url('admin/courses/edit/'.$c['course_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="<?= base_url('admin/courses/delete/'.$c['course_id']) ?>"
                class="btn btn-danger btn-sm btn-delete"
                data-name="<?= esc($c['course_name']) ?>">
                Hapus
              </a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
