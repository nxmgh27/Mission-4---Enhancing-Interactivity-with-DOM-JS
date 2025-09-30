<?= $this->extend('layouts/student') ?>
<?= $this->section('content') ?>

<div class="card shadow">
  <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
    <span>Daftar Mata Kuliah</span>
    <span>Total SKS: <span id="total-sks">0</span></span>
  </div>
  <div class="card-body">

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('student/courses/enrollSelected') ?>">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>Pilih</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Semester</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($courses as $c): ?>
            <?php $isTaken = in_array($c['course_id'], $takenIds); ?>
            <tr>
              <td>
                <input type="checkbox"
                       name="courses[]"
                       value="<?= $c['course_id'] ?>"
                       data-sks="<?= $c['credits'] ?>"
                       <?= $isTaken ? 'checked disabled' : '' ?>>
              </td>
              <td><?= esc($c['course_code']) ?></td>
              <td><?= esc($c['course_name']) ?></td>
              <td><?= esc($c['credits']) ?></td>
              <td><?= esc($c['semester']) ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>

      <button type="submit" class="btn btn-success mt-2">Ambil Terpilih</button>
    </form>
  </div>
</div>

<script>
  const checkboxes = document.querySelectorAll('input[name="courses[]"]');
  const totalSks = document.getElementById('total-sks');

  function updateTotal() {
    let total = 0;
    checkboxes.forEach(cb => {
      if (cb.checked && !cb.disabled) {
        total += parseInt(cb.dataset.sks);
      }
    });
    totalSks.textContent = total;
  }

  checkboxes.forEach(cb => cb.addEventListener('change', updateTotal));
  updateTotal();
</script>

<?= $this->endSection() ?>
