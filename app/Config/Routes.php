<?php

use CodeIgniter\Router\RouteCollection;
// Pastikan semua controller yang Anda gunakan di-use di sini
use App\Controllers\Home;
use App\Controllers\Login;
use App\Controllers\SignUp;
// Tambahkan use untuk controller lain jika Anda punya (misal ForgotPassword, ChangePassword, TempatDetail)

/**
 * @var RouteCollection $routes
 */

// --- Routing Halaman Publik/Autentikasi ---
$routes->get('/login', 'Login::login');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout'); // Route untuk logout

// Routing untuk Sign Up
$routes->get('/signup', 'SignUp::signup');
$routes->post('/signup/process', 'SignUp::process');

// Route untuk halaman Forgot Password & Change Password jika ada
// $routes->get('/forgotpass', 'ForgotPassword::forgotpass');
// $routes->get('/changepass', 'ChangePassword::changepass');

// --- Routing Dashboard Utama ---
// Semua dashboard diarahkan ke Home::index()
$routes->get('/', 'Landing::landingPage'); // Route default untuk root situs (setelah login)
$routes->get('/home', 'Home::index'); // Route untuk halaman home dashboard
// Anda bisa hapus route lama seperti /homeuser, /homepemilik, /homeadmin jika Anda tidak ingin menggunakannya lagi,
// karena sekarang semua akan melalui /home dan logic role ada di controller Home.

// --- Routing untuk Submit Form (Non-AJAX, Full Page Reload) ---
// Semua ini adalah POST karena mereka memproses data form
$routes->post('/home/submitAddPlace', 'Home::submitAddPlace');
$routes->post('/home/updateProfile', 'Home::updateProfile');
$routes->post('/home/changePassword', 'Home::changePassword');
$routes->post('/home/deleteAccount', 'Home::deleteAccount');
$routes->post('/home/verifyRequest', 'Home::verifyRequest');

// --- Routing Halaman Detail Tempat ---
// Contoh: http://localhost:8080/tempat/ID_tempat_disini
// Ganti 'NamaControllerTempat' dan 'detailMethod' dengan controller dan method yang sesuai
// $routes->get('/tempat/(:segment)', 'NamaControllerTempat::detailMethod/$1');

// --- Routing Halaman Detail Tempat ---
$routes->get('/tempat/(:segment)', 'Tempat::detail/$1');

// --- Routing API / Form Submit Tambahan (jika ada) ---
// Contoh: Untuk submit review dari halaman detail
$routes->post('/home/submitReview', 'Home::submitReview'); // Mengarahkan ke Home controller
