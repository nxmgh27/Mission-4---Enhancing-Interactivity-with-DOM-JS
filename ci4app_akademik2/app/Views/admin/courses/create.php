<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="card shadow">
  <div class="card-header bg-success text-white">
    Tambah Mata Kuliah
  </div>
  <div class="card-body">
    <form id="courseForm" method="post" action="<?= base_url('admin/courses/store') ?>">
      <div class="mb-3">
        <label for="course_code" class="form-label">Kode Mata Kuliah</label>
        <input type="text" class="form-control" id="course_code" name="course_code">
        <small class="text-danger error-message"></small>
      </div>

      <div class="mb-3">
        <label for="course_name" class="form-label">Nama Mata Kuliah</label>
        <input type="text" class="form-control" id="course_name" name="course_name">
        <small class="text-danger error-message"></small>
      </div>

      <div class="mb-3">
        <label for="credits" class="form-label">Jumlah SKS</label>
        <input type="number" class="form-control" id="credits" name="credits">
        <small class="text-danger error-message"></small>
      </div>

      <div class="mb-3">
        <label for="semester" class="form-label">Semester</label>
        <input type="number" class="form-control" id="semester" name="semester">
        <small class="text-danger error-message"></small>
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="<?= base_url('admin/courses') ?>" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>

<script>
document.getElementById("courseForm").addEventListener("submit", function(e) {
  e.preventDefault();
  let isValid = true;

  const inputs = this.querySelectorAll("input");
  inputs.forEach(input => {
    const errorMsg = input.nextElementSibling;
    if (input.value.trim() === "") {
      input.classList.add("is-invalid");
      errorMsg.textContent = "Field ini wajib diisi!";
      isValid = false;
    } else {
      input.classList.remove("is-invalid");
      input.classList.add("is-valid");
      errorMsg.textContent = "";
    }
  });

  if (isValid) {
    this.submit();
  }
});
</script>

<?= $this->endSection() ?>
