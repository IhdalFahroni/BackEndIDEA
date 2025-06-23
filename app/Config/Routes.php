<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */

// --- Routing Halaman Publik/Autentikasi ---
$routes->get('/login', 'Login::login');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');

// Routing untuk Sign Up
$routes->get('/signup', 'SignUp::signup');
$routes->post('/signup/process', 'SignUp::process');
$routes->get('/forgotpass', 'ForgotPassword::forgotPassword');
$routes->post('password/process-reset', 'ForgotPassword::processResetPassword');

// --- Routing Dashboard Utama ---
$routes->get('/', 'Landing::landingPage'); 
$routes->get('/landing', 'Landing::landingPage');
$routes->get('/home', 'Home::index');

// --- Routing untuk Submit Form (Non-AJAX, Full Page Reload) ---
$routes->post('profile/update', 'Akun::updateProfile');
$routes->post('password/change', 'Akun::changePassword');
$routes->post('account/delete', 'Akun::deleteAccount');

// -- Aksi terkait Konten (Review, Tempat, Menu) --
$routes->post('review/submit', 'Akun::submitReview');
$routes->post('formAddPlace/submit', 'Akun::submitAddPlace');
$routes->post('formKlaim/submit', 'Akun::submitClaimForm');
$routes->post('menu/add', 'Akun::addMenuItem');
$routes->post('promo/add', 'Akun::addPromoItem');
$routes->post('menu/delete', 'Akun::deleteMenuItem');
$routes->post('promo/delete', 'Akun::deletePromoItem');
$routes->post('tempat/update/deskripsi', 'Akun::updateDeskripsi');

$routes->post('tempat/update', 'Akun::updateTempat');

$routes->post('verify', 'Admin::verifyRequest');
$routes->post('review/delete', 'Admin::deleteReview');

