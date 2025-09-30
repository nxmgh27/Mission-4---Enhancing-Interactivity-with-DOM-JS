<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\StdTakesModel;

class Courses extends BaseController
{
    protected $courseModel;
    protected $stdTakesModel;

    public function __construct()
    {
        $this->courseModel   = new CourseModel();
        $this->stdTakesModel = new StdTakesModel();
    }

    // ====================== INDEX ======================
    public function index()
    {
        $studentId = session()->get('student_id'); 

        // semua matkul
        $courses = $this->courseModel->findAll();

        // daftar course_id yang sudah diambil mahasiswa ini
        $takenIds = $this->stdTakesModel
                        ->where('student_id', $studentId)
                        ->findColumn('course_id');

        return view('student/courses/index', [
            'courses'  => $courses,
            'takenIds' => $takenIds ?? []   // 👈 selalu dikirim, walau kosong
        ]);
    }

    // ====================== ENROLL SELECTED ======================
    public function enrollSelected()
    {
        $studentId = session()->get('student_id');
        if (!$studentId) {
            return redirect()->back()->with('error', 'Mahasiswa tidak valid, silakan login ulang.');
        }

        $courseIds = $this->request->getPost('courses');
        if (!$courseIds) {
            return redirect()->back()->with('error', 'Tidak ada mata kuliah yang dipilih.');
        }

        foreach ($courseIds as $courseId) {
            // cek apakah sudah pernah diambil
            $already = $this->stdTakesModel
                            ->where('student_id', $studentId)
                            ->where('course_id', $courseId)
                            ->first();

            if (!$already) {
                $this->stdTakesModel->insert([
                    'student_id' => $studentId,
                    'course_id'  => $courseId,
                    'enroll_date'=> date('Y-m-d H:i:s'),
                    'status'     => 'active'
                ]);
            }
        }

        return redirect()->to('/student/mycourses')->with('success', 'KRS berhasil diambil.');
    }

    // ====================== MY COURSES ======================
    public function mycourses()
    {
        $studentId = session()->get('student_id');

        $mycourses = $this->stdTakesModel
            ->select('courses.course_code, courses.course_name, courses.credits, courses.semester')
            ->join('courses', 'courses.course_id = std_takes.course_id')
            ->where('std_takes.student_id', $studentId)
            ->findAll();

        return view('student/mycourses', ['mycourses' => $mycourses]);
    }
}
