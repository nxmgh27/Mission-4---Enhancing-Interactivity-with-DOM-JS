<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default ke login
$routes->get('/', function() {
    return redirect()->to('/login');
});

// ==================== AUTH ====================
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// ==================== ADMIN ====================
$routes->group('admin', ['filter' => 'authadmin'], function($routes) {
    // Dashboard
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // CRUD Courses
    $routes->get('courses', 'Admin\Courses::index');
    $routes->get('courses/create', 'Admin\Courses::create');
    $routes->post('courses/store', 'Admin\Courses::store');
    $routes->get('courses/edit/(:num)', 'Admin\Courses::edit/$1');
    $routes->post('courses/update/(:num)', 'Admin\Courses::update/$1');
    $routes->get('courses/delete/(:num)', 'Admin\Courses::delete/$1');
    

    // CRUD Students
    $routes->get('students', 'Admin\Students::index');
    $routes->get('students/create', 'Admin\Students::create');
    $routes->post('students/store', 'Admin\Students::store');
    $routes->get('students/edit/(:num)', 'Admin\Students::edit/$1');
    $routes->post('students/update/(:num)', 'Admin\Students::update/$1');
    $routes->get('students/delete/(:num)', 'Admin\Students::delete/$1');
});

// ==================== STUDENT ====================
$routes->group('student', ['filter' => 'authstudent'], function($routes) {
    // Dashboard
    $routes->get('dashboard', 'Student\Dashboard::index');

    // Courses
    $routes->get('courses', 'Student\Courses::index');                     // lihat daftar matkul
    $routes->post('courses/enroll/(:num)', 'Student\Courses::enroll/$1');  // ambil satu matkul
    $routes->post('courses/enrollSelected', 'Student\Courses::enrollSelected'); // ambil banyak sekaligus

    // My Courses (KRS)
    $routes->get('mycourses', 'Student\Courses::mycourses');
});
