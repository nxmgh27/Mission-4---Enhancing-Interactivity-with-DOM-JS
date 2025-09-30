<?= $this->extend('layouts/student') ?>
<?= $this->section('content') ?>

<div class="card shadow">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-0">Mata Kuliah yang Diambil</h5>
  </div>

    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>Kode</th>
          <th>Nama Mata Kuliah</th>
          <th>SKS</th>
          <th>Semester</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($mycourses)): ?>
          <?php foreach ($mycourses as $course): ?>
            <tr>
              <td><?= esc($course['course_code']) ?></td>
              <td><?= esc($course['course_name']) ?></td>
              <td><?= esc($course['credits']) ?></td>
              <td><?= esc($course['semester']) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" class="text-center">Belum ada mata kuliah yang diambil.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
