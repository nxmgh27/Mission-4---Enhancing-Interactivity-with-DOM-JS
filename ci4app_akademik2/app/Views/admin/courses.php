<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Daftar Courses</h3>
  <a href="/admin/courses/create" class="btn btn-primary">Tambah Course</a>
</div>

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
    <?php foreach($courses as $c): ?>
    <tr>
      <td><?= $c['course_id'] ?></td>
      <td><?= $c['course_code'] ?></td>
      <td><?= $c['course_name'] ?></td>
      <td><?= $c['credits'] ?></td>
      <td><?= $c['semester'] ?></td>
      <td>
        <a href="/admin/courses/edit/<?= $c['course_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="/admin/courses/delete/<?= $c['course_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= $this->endSection() ?>
