<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CourseModel;

class Courses extends BaseController
{
    protected $courseModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
    }

    public function index()
    {
        $courses = $this->courseModel->findAll();
        return view('admin/courses/index', ['courses' => $courses]);
    }

    public function create()
    {
        return view('admin/courses/create');
    }

    public function store()
    {
        $this->courseModel->insert([
            'course_code' => $this->request->getPost('course_code'),
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits'),
            'semester'    => $this->request->getPost('semester'),
        ]);

        session()->setFlashdata('success', 'Mata kuliah berhasil ditambahkan!');
        return redirect()->to('admin/courses');
    }

    public function edit($id)
    {
        $course = $this->courseModel->find($id);
        return view('admin/courses/edit', ['course' => $course]);
    }

    public function update($id)
    {
        $this->courseModel->update($id, [
            'course_code' => $this->request->getPost('course_code'),
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits'),
            'semester'    => $this->request->getPost('semester'),
        ]);

        session()->setFlashdata('success', 'Mata kuliah berhasil diperbarui!');
        return redirect()->to('admin/courses');
    }

    public function delete($id)
    {
        $this->courseModel->delete($id);
        session()->setFlashdata('success', 'Mata kuliah berhasil dihapus!');
        return redirect()->to('admin/courses');
    }
}
