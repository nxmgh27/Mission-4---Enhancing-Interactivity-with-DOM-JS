<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthStudent implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'student') {
            return redirect()->to('/login');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
