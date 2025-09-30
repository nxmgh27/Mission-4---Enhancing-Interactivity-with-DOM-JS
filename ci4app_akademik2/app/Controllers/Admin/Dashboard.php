<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\CourseModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $studentModel = new StudentModel();
        $courseModel  = new CourseModel();

        $totalStudents = $studentModel->countAllResults();
        $totalCourses  = $courseModel->countAllResults();

        return view('admin/dashboard', [
            'totalStudents' => $totalStudents,
            'totalCourses'  => $totalCourses,
        ]);
    }
}
