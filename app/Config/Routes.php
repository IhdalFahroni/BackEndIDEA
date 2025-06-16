<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Landing::landingPage');
$routes->get('/login', 'Login::login');
$routes->get('/signup', 'SignUp::signup');
$routes->get('/forgotpass', 'ForgotPassword::forgotpass');
$routes->get('/changepass', 'ChangePassword::changepass');
$routes->get('/homeuser', 'HomeUser::homeuser');
