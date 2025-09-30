<?= $this->extend('layouts/student') ?>
<?= $this->section('content') ?>

<div class="container-fluid mt-4">
  <div class="card shadow border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Daftar Mata Kuliah</h5>
      <div>
        <span class="me-3">Total SKS: <strong id="total-sks">0</strong></span>
        <button id="btn-ambil-terpilih" class="btn btn-success btn-sm" disabled>Ambil Terpilih</button>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>Pilih</th>
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
            <td class="text-center">
              <input type="checkbox" class="course-checkbox"
                     data-id="<?= $c['course_id'] ?>"
                     data-sks="<?= $c['credits'] ?>"
                     <?= !empty($c['enrolled']) ? 'disabled' : '' ?>>
            </td>
            <td><?= esc($c['course_code']) ?></td>
            <td><?= esc($c['course_name']) ?></td>
            <td><?= esc($c['credits']) ?></td>
            <td><?= esc($c['semester']) ?></td>
            <td class="action-cell">
              <?php if (!empty($c['enrolled'])): ?>
                <button class="btn btn-secondary btn-sm" disabled>Sudah Diambil</button>
              <?php else: ?>
                <form method="post" action="<?= base_url('student/courses/enroll/'.$c['course_id']) ?>" style="display:inline;">
                  <?= csrf_field() ?>
                  <button type="submit" class="btn btn-success btn-sm">Ambil</button>
                </form>
              <?php endif ?>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
