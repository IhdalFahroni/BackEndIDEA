<?php

use CodeIgniter\Router\RouteCollection;
// Pastikan semua controller di-use di sini
use App\Controllers\Home;
use App\Controllers\Login;
use App\Controllers\SignUp;
// Jika Anda membuat controller AddPlace, pastikan juga di-use
use App\Controllers\AddPlace; 
// ... tambahkan use untuk controller lain yang Anda miliki (ForgotPassword, ChangePassword, dll.)

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Landing::landingPage');
$routes->get('/login', 'Login::login');
$routes->post('/login/process', 'Login::process');

$routes->get('/signup', 'SignUp::signup');
$routes->post('/signup/process', 'SignUp::process');


$routes->get('/forgotpass', 'ForgotPassword::forgotpass');
$routes->get('/changepass', 'ChangePassword::changepass');
$routes->get('/home', 'Home::index');
$routes->get('/wisatauser', 'WisataUser::wisatauser');
$routes->get('/wisatapemilik', 'WisataPemilik::wisatapemilik');
$routes->get('/wisataadmin', 'WisataAdmin::wisataadmin');

$routes->get('/kulineruser', 'KulinerUser::kulineruser');
$routes->post('/kulineruser/klaimTempat', 'KulinerUser::klaimTempat');

$routes->get('/kulinerpemilik', 'KulinerPemilik::kulinerpemilik');
$routes->get('/kulineradmin', 'KulinerAdmin::kulineradmin');

// --- Routing API Endpoints (untuk AJAX) ---
// Contoh endpoint untuk submit form Add Place
$routes->post('/api/add-attraction', 'Home::submitAddPlace'); // Mengarah ke method di Home controller
// Jika Anda membuat controller AddPlace terpisah, maka:
// $routes->post('/api/add-attraction', 'AddPlace::submitAttraction');

// Contoh endpoint untuk update profil
$routes->post('/api/profile/update', 'Home::updateProfile');
// Contoh endpoint untuk ganti password
$routes->post('/api/profile/change-password', 'Home::changePassword');
// Contoh endpoint untuk hapus akun
$routes->post('/api/profile/delete-account', 'Home::deleteAccount');
// Contoh endpoint untuk verifikasi (Admin)
$routes->post('/api/admin/verify-request', 'Home::verifyRequest');

// --- Routing Lainnya ---
$routes->get('/tempat/(:segment)', 'NamaControllerTempat::NamaMethodDetail/$1'); // Route untuk detail tempat