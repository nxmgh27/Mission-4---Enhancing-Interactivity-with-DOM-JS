<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="card shadow">
  <div class="card-header bg-primary text-white">
    Tambah Mahasiswa
  </div>
  <div class="card-body">
    <form id="studentForm" method="post" action="<?= base_url('admin/students/store') ?>">
      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim">
        <small class="text-danger error-message"></small>
      </div>

      <div class="mb-3">
        <label for="full_name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="full_name" name="full_name">
        <small class="text-danger error-message"></small>
      </div>

      <div class="mb-3">
        <label for="semester" class="form-label">Semester</label>
        <input type="number" class="form-control" id="semester" name="semester">
        <small class="text-danger error-message"></small>
      </div>

      <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="text" class="form-control" id="kelas" name="kelas">
        <small class="text-danger error-message"></small>
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="<?= base_url('admin/students') ?>" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>

<script>
document.getElementById("studentForm").addEventListener("submit", function(e) {
  e.preventDefault();
  let isValid = true;

  // ambil semua input
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
    this.submit(); // kirim form kalau valid
  }
});
</script>

<?= $this->endSection() ?>
