<?= $this->extend('layouts/student') ?>
<?= $this->section('content') ?>

<div class="card shadow">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-0">Mata Kuliah yang Diambil</h5>
  </div>
  <div class="card-body">
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

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
        <?php 
          $totalSks = 0;
          if (!empty($mycourses)): 
            foreach ($mycourses as $course): 
              $totalSks += (int)$course['credits'];
        ?>
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
      <?php if (!empty($mycourses)): ?>
      <tfoot>
        <tr class="fw-bold">
          <td colspan="2" class="text-end">Total SKS</td>
          <td colspan="2"><?= $totalSks ?></td>
        </tr>
      </tfoot>
      <?php endif; ?>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
