<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\UserModel;

class Students extends BaseController
{
    protected $studentModel;
    protected $userModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->userModel    = new UserModel();
    }

    // ================= LIST =================
    public function index()
    {
        $students = $this->studentModel->getAllWithUser();

        return view('admin/students/index', [
            'students' => $students
        ]);
    }

    // ================= CREATE =================
    public function create()
    {
        return view('admin/students/create');
    }

    public function store()
    {
        $dataUser = [
            'username'  => $this->request->getPost('username'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'      => 'student',
            'full_name' => $this->request->getPost('full_name'),
        ];

        $this->userModel->insert($dataUser);
        $userId = $this->userModel->insertID();

        $dataStudent = [
            'user_id'    => $userId,
            'nim'        => $this->request->getPost('nim'),
            'kelas'      => $this->request->getPost('kelas'),
            'semester'   => $this->request->getPost('semester'),
            'entry_year' => date('Y'),
        ];

        $this->studentModel->insert($dataStudent);

        return redirect()->to('/admin/students')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $student = $this->studentModel->getAllWithUser();
        $student = array_filter($student, fn($s) => $s['student_id'] == $id);
        $student = reset($student);

        return view('admin/students/edit', [
            'student' => $student
        ]);
    }

    public function update($id)
    {
        $student = $this->studentModel->find($id);

        // update user
        $this->userModel->update($student['user_id'], [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ]);

        // update password kalau diisi
        if ($this->request->getPost('password')) {
            $this->userModel->update($student['user_id'], [
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);
        }

        // update student
        $this->studentModel->update($id, [
            'nim'      => $this->request->getPost('nim'),
            'kelas'    => $this->request->getPost('kelas'),
            'semester' => $this->request->getPost('semester'),
        ]);

        return redirect()->to('/admin/students')->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $student = $this->studentModel->find($id);

        if ($student) {
            $this->studentModel->delete($id);
            $this->userModel->delete($student['user_id']);
            return redirect()->to('/admin/students')->with('success', 'Data mahasiswa berhasil dihapus');
        }

        return redirect()->to('/admin/students')->with('error', 'Data mahasiswa tidak ditemukan');
    }
}
