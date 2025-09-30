// app.js - global frontend helpers for Mission 4
document.addEventListener('DOMContentLoaded', () => {
  const baseUrl = document.querySelector('meta[name="base-url"]').getAttribute('content');
  const csrfNameMeta = document.querySelector('meta[name="csrf-name"]');
  const csrfHashMeta = document.querySelector('meta[name="csrf-hash"]');

  const getCsrf = () => {
    return {
      name: csrfNameMeta ? csrfNameMeta.getAttribute('content') : '',
      hash: csrfHashMeta ? csrfHashMeta.getAttribute('content') : ''
    };
  };

  const setCsrfHash = (newHash) => {
    if (csrfHashMeta) csrfHashMeta.setAttribute('content', newHash);
    const tokenName = csrfNameMeta ? csrfNameMeta.getAttribute('content') : null;
    if (tokenName) {
      document.querySelectorAll(`input[name="${tokenName}"]`).forEach(i => i.value = newHash);
    }
  };

  // ================= MENU ACTIVE =================
  document.querySelectorAll('.sidebar a').forEach(a => {
    try {
      const href = new URL(a.href);
      if (href.pathname === location.pathname) {
        a.classList.add('active');
      }
    } catch (e) {}
  });

  // ================= FORM VALIDATION =================
  document.querySelectorAll('form.validate-form').forEach(form => {
    form.addEventListener('submit', (e) => {
      let valid = true;
      form.querySelectorAll('[required]').forEach(inp => {
        if (!inp.value || inp.value.trim() === '') {
          valid = false;
          inp.classList.add('is-invalid');
          if (!inp.nextElementSibling || !inp.nextElementSibling.classList.contains('invalid-feedback')) {
            const fb = document.createElement('div');
            fb.className = 'invalid-feedback';
            fb.innerText = 'Field ini wajib diisi.';
            inp.parentNode.insertBefore(fb, inp.nextSibling);
          }
        } else {
          inp.classList.remove('is-invalid');
          if (inp.nextElementSibling && inp.nextElementSibling.classList.contains('invalid-feedback')) {
            inp.nextElementSibling.remove();
          }
        }
      });
      if (!valid) {
        e.preventDefault();
        const first = form.querySelector('.is-invalid');
        if (first) first.focus();
      }
    });

    form.querySelectorAll('[required]').forEach(inp => {
      inp.addEventListener('input', () => {
        if (inp.value.trim() !== '') {
          inp.classList.remove('is-invalid');
          if (inp.nextElementSibling && inp.nextElementSibling.classList.contains('invalid-feedback')) {
            inp.nextElementSibling.remove();
          }
        }
      });
    });
  });

  // ================= DELETE CONFIRM =================
  document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', (ev) => {
      ev.preventDefault();
      const name = btn.dataset.name || 'item';
      const href = btn.getAttribute('href');
      if (confirm(`Yakin ingin menghapus ${name} ?`)) {
        window.location.href = href;
      }
    });
  });

  // ================= STUDENT COURSES =================
  const courseCheckboxes = document.querySelectorAll('.course-checkbox');
  const totalSksEl = document.getElementById('total-sks');
  const btnAmbilTerpilih = document.getElementById('btn-ambil-terpilih');

  function computeTotalSks() {
    let total = 0;
    document.querySelectorAll('.course-checkbox:checked').forEach(cb => {
      const sks = parseInt(cb.dataset.sks) || 0;
      total += sks;
    });
    if (totalSksEl) totalSksEl.innerText = total;
    if (btnAmbilTerpilih) btnAmbilTerpilih.disabled = (total === 0);
  }

  if (courseCheckboxes.length) {
    courseCheckboxes.forEach(cb => cb.addEventListener('change', computeTotalSks));
    computeTotalSks();
  }

  function showToast(msg, type = 'success', timeout = 3000) {
    const t = document.createElement('div');
    t.className = `toast-notif p-3 text-white ${type === 'success' ? 'bg-success' : 'bg-danger'}`;
    t.style.position = 'fixed';
    t.style.right = '20px';
    t.style.top = '20px';
    t.style.zIndex = 9999;
    t.style.borderRadius = '6px';
    t.innerText = msg;
    document.body.appendChild(t);
    setTimeout(() => t.remove(), timeout);
  }

  if (btnAmbilTerpilih) {
    btnAmbilTerpilih.addEventListener('click', async () => {
      const selected = Array.from(document.querySelectorAll('.course-checkbox:checked')).map(cb => cb.dataset.id);

      if (!selected.length) {
        showToast('Pilih minimal 1 mata kuliah.', 'danger', 2500);
        return;
      }

      const formData = new FormData();
      selected.forEach(id => formData.append('course_ids[]', id));

      const csrf = getCsrf();
      if (csrf.name && csrf.hash) formData.append(csrf.name, csrf.hash);

      try {
        btnAmbilTerpilih.disabled = true;
        btnAmbilTerpilih.innerText = 'Memproses...';

        const res = await fetch(baseUrl + 'student/courses/enroll-multiple', {
          method: 'POST',
          body: formData,
          credentials: 'same-origin'
        });

        const data = await res.json();

        if (data.success) {
          selected.forEach(id => {
            const cb = document.querySelector(`.course-checkbox[data-id="${id}"]`);
            if (cb) {
              cb.checked = false;
              cb.disabled = true;
              const row = cb.closest('tr');
              if (row) {
                const actionCell = row.querySelector('.action-cell');
                if (actionCell) {
                  actionCell.innerHTML = '<button class="btn btn-secondary btn-sm" disabled>Sudah Diambil</button>';
                }
              }
            }
          });
          if (data.newHash) setCsrfHash(data.newHash);
          computeTotalSks();
          showToast(data.message || 'Berhasil ambil mata kuliah');
        } else {
          showToast(data.message || 'Gagal mengambil mata kuliah', 'danger');
        }
      } catch (err) {
        console.error(err);
        showToast('Terjadi kesalahan jaringan.', 'danger');
      } finally {
        btnAmbilTerpilih.disabled = false;
        btnAmbilTerpilih.innerText = 'Ambil Terpilih';
      }
    });
  }

});
