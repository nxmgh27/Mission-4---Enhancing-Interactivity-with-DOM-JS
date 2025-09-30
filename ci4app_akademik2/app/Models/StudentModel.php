<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'students';
    protected $primaryKey = 'student_id';
    protected $allowedFields = ['user_id', 'nim', 'kelas', 'semester', 'entry_year'];

    // Ambil data student join dengan users
    public function getAllWithUser()
    {
        return $this->select('students.student_id, students.nim, students.kelas, students.semester, users.username, users.full_name')
                    ->join('users', 'users.user_id = students.user_id')
                    ->findAll();
    }
}
