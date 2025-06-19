<?php

use CodeIgniter\Router\RouteCollection;
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
$routes->get('/homeuser', 'HomeUser::homeuser');
$routes->get('/homepemilik', 'HomePemilik::homepemilik');
$routes->get('/homeadmin', 'HomeAdmin::homeadmin');
$routes->get('/wisatauser', 'WisataUser::wisatauser');
$routes->get('/wisatapemilik', 'WisataPemilik::wisatapemilik');
$routes->get('/wisataadmin', 'WisataAdmin::wisataadmin');

$routes->get('/kulineruser', 'KulinerUser::kulineruser');
$routes->post('/kulineruser/klaimTempat', 'KulinerUser::klaimTempat');

$routes->get('/kulinerpemilik', 'KulinerPemilik::kulinerpemilik');
$routes->get('/kulineradmin', 'KulinerAdmin::kulineradmin');
