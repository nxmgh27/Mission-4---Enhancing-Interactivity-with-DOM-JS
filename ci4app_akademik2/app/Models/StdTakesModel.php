<?php
namespace App\Models;
use CodeIgniter\Model;

class StdTakesModel extends Model
{
    protected $table = 'std_takes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id','course_id','enroll_date','grade','status'];

    // Ambil semua course_id yang sudah diambil mahasiswa
    public function getTakenCourseIds($studentId)
    {
        return $this->where('student_id', $studentId)
                    ->findColumn('course_id'); // return array of course_id
    }

    // Ambil detail matkul yg sudah diambil mahasiswa
    public function getByStudent($studentId)
    {
        return $this->select('courses.kode, courses.nama, courses.sks, courses.semester')
                    ->join('courses', 'courses.course_id = std_takes.course_id')
                    ->where('std_takes.student_id', $studentId)
                    ->findAll();
    }
}
