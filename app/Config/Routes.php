<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Landing', 'Landing::landingPage');
$routes->get('/login', 'Login::login');
