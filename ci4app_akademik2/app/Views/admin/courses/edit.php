<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="card shadow border-0">
    <div class="card-header bg-warning text-dark">
      <h5 class="mb-0">Edit Mata Kuliah</h5>
    </div>
    <div class="card-body">
      <form class="validate-form" action="<?= base_url('admin/courses/update/'.$course['course_id']) ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="course_code" class="form-label">Kode Mata Kuliah</label>
          <input type="text" class="form-control" id="course_code" name="course_code"
                 value="<?= esc($course['course_code']) ?>" required>
        </div>
        <div class="mb-3">
          <label for="course_name" class="form-label">Nama Mata Kuliah</label>
          <input type="text" class="form-control" id="course_name" name="course_name"
                 value="<?= esc($course['course_name']) ?>" required>
        </div>
        <div class="mb-3">
          <label for="credits" class="form-label">Jumlah SKS</label>
          <input type="number" class="form-control" id="credits" name="credits"
                 value="<?= esc($course['credits']) ?>" min="1" required>
        </div>
        <div class="mb-3">
          <label for="semester" class="form-label">Semester</label>
          <input type="number" class="form-control" id="semester" name="semester"
                 value="<?= esc($course['semester']) ?>" min="1" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= base_url('admin/courses') ?>" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
