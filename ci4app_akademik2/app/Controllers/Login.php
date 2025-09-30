<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\StudentModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $userModel = new UserModel();
        $studentModel = new StudentModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && md5($password) === $user['password']) {
            $ses_data = [
                'user_id'    => $user['user_id'],
                'username'   => $user['username'],
                'full_name'  => $user['full_name'],
                'role'       => $user['role'],
                'isLoggedIn' => true,
            ];

            if ($user['role'] === 'student') {
                $student = $studentModel->where('user_id', $user['user_id'])->first();
                if ($student) {
                    $ses_data['student_id'] = $student['student_id'];
                    $ses_data['nim']        = $student['nim'];
                    $ses_data['kelas']      = $student['kelas'];
                    $ses_data['semester']   = $student['semester'];
                }
            }

            $session->set($ses_data);
            return redirect()->to('/'.$user['role'].'/dashboard');
        } else {
            $session->setFlashdata('msg', 'Username atau password salah');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}