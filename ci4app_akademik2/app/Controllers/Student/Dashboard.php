<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\StdTakesModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $studentId   = session()->get('student_id');
        $studentName = session()->get('full_name'); // ambil dari session

        $stdTakesModel = new StdTakesModel();
        $totalTaken = $stdTakesModel
            ->where('student_id', $studentId)
            ->countAllResults();

        return view('student/dashboard', [
            'studentName' => $studentName,
            'totalTaken'  => $totalTaken,
        ]);
    }
}
