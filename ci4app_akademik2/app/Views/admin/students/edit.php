<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<h3>Edit Mahasiswa</h3>
<form method="post" action="<?= base_url('admin/students/update/'.$student['student_id']) ?>">
  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" class="form-control" id="nim" name="nim" value="<?= esc($student['nim']) ?>" required>
  </div>
  <div class="mb-3">
    <label for="full_name" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="full_name" name="full_name" value="<?= esc($student['full_name']) ?>" required>
  </div>
  <div class="mb-3">
    <label for="kelas" class="form-label">Kelas</label>
    <input type="text" class="form-control" id="kelas" name="kelas" value="<?= esc($student['kelas']) ?>" required>
  </div>
  <div class="mb-3">
    <label for="semester" class="form-label">Semester</label>
    <input type="number" class="form-control" id="semester" name="semester" value="<?= esc($student['semester']) ?>" required>
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?= esc($student['username']) ?>" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password (kosongkan jika tidak diubah)</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-success">Update</button>
  <a href="<?= base_url('admin/students') ?>" class="btn btn-secondary">Batal</a>
</form>
<?= $this->endSection() ?>
