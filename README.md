# Mission-4---Enhancing-Interactivity-with-DOM-JS
Siap 🚀 aku bikinin draft **README.md** untuk repo tugas kamu. README ini sesuai dengan **Mission 3 & 4** (auth, role admin/student, interaktivitas DOM/JS, validasi, flash message, dll).

---

## 📘 README.md

```markdown
# Sistem Akademik Sederhana (CodeIgniter 4)

Proyek ini adalah implementasi sistem akademik sederhana menggunakan **CodeIgniter 4** sebagai backend, dengan **Bootstrap 5** dan **JavaScript (DOM & Event Handling)** untuk interaktivitas UI.

---

## Fitur

### Authentication & Authorization
- Login dengan role **Admin** dan **Student**.
- Role-based access:
  - **Admin** → Kelola mahasiswa & mata kuliah.
  - **Student** → Lihat daftar mata kuliah, ambil (enroll), dan cek KRS.

### Admin
- CRUD Mahasiswa:
  - Tambah, edit, hapus data mahasiswa.
  - Validasi input (username unik, NIM wajib).
  - Konfirmasi sebelum hapus (flash message sukses/error).
- CRUD Mata Kuliah:
  - Tambah, edit, hapus data mata kuliah.
  - Validasi input (kode unik, SKS angka).
- Dashboard: ringkasan total mahasiswa & mata kuliah.

### Student
- Lihat daftar mata kuliah.
- Pilih mata kuliah dengan **checkbox**.
- Hitung otomatis total SKS dengan **JavaScript**.
- Tidak bisa double-enroll (matkul yang sudah diambil akan `disabled`).
- Lihat daftar KRS (mata kuliah yang sudah diambil).

### UI & Interaktivitas
- Template layout terpisah untuk Admin & Student.
- Menggunakan **Bootstrap 5** (cards, tables, alerts).
- Flash message (success/error) untuk aksi CRUD.
- Validasi form dengan JavaScript:
  - Field kosong diberi border merah + pesan error.
  - Hanya submit jika semua input valid.
- Konfirmasi hapus (dialog `confirm` atau bisa pakai SweetAlert2).
- Menu aktif berubah style saat dipilih.
- Contoh penggunaan `setTimeout` untuk notifikasi otomatis hilang.

---

## Teknologi
- **Backend**: [CodeIgniter 4](https://codeigniter.com/) (PHP Framework).
- **Frontend**: Bootstrap 5, JavaScript (DOM Manipulation & Event Handling).
- **Database**: MySQL/MariaDB.
- **Auth**: Session-based login dengan role admin/student.

---

## Struktur Proyek
```

app/
├── Controllers/
│    ├── Admin/
│    │    ├── Students.php
│    │    ├── Courses.php
│    │    └── Dashboard.php
│    ├── Student/
│    │    ├── Courses.php
│    │    └── Dashboard.php
│    └── Login.php
├── Models/
│    ├── UserModel.php
│    ├── StudentModel.php
│    ├── CourseModel.php
│    └── StdTakesModel.php
├── Views/
│    ├── layouts/
│    │    ├── admin.php
│    │    └── student.php
│    ├── admin/
│    │    ├── students/
│    │    ├── courses/
│    │    └── dashboard.php
│    ├── student/
│    │    ├── courses/
│    │    └── mycourses.php
│    └── login.php

````

---

## Cara Menjalankan
1. Clone repo ini:
   ```bash
   git clone https://github.com/username/ci4_akademik.git
   cd ci4_akademik
````

2. Install dependencies:

   ```bash
   composer install
   ```

3. Buat database `akademik_mhs` lalu import tabel:

   * `users`
   * `students`
   * `courses`
   * `std_takes`

4. Sesuaikan koneksi database di `.env`:

   ```
   database.default.hostname = localhost
   database.default.database = akademik_mhs
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   ```

5. Jalankan server:

   ```bash
   php spark serve
   ```

6. Akses di browser:

   * Login → [http://localhost:8080/login](http://localhost:8080/login)
   * Admin Dashboard → `/admin/dashboard`
   * Student Dashboard → `/student/dashboard`


## 📸 Screenshots

* Login Page
  <img width="940" height="434" alt="image" src="https://github.com/user-attachments/assets/4ec83820-1d68-42bf-8d5b-58ebad848f3a" />

* Dashboard Admin
  <img width="1920" height="821" alt="image" src="https://github.com/user-attachments/assets/ed372125-e335-4e01-bf23-b1038dd66e1a" />

* Daftar Mahasiswa
  <img width="1920" height="823" alt="image" src="https://github.com/user-attachments/assets/fb5ce60e-31b2-49a8-924c-96f24fb4620b" />

* Daftar Mata Kuliah
  <img width="1920" height="817" alt="image" src="https://github.com/user-attachments/assets/b5650622-4795-4bd0-94de-0ba6579430b4" />

* Dashboard Student
  <img width="940" height="437" alt="image" src="https://github.com/user-attachments/assets/604ef162-7a2a-4df2-babb-b891a428ec1a" />

* Daftar KRS
  <img width="1920" height="821" alt="image" src="https://github.com/user-attachments/assets/71062754-dc43-4c1f-9774-80ab95f4e467" />


