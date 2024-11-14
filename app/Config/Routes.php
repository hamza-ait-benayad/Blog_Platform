<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('auth/register', 'AuthController::register');
$routes->post('auth/register', 'AuthController::register');
$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::login');
$routes->get('auth/logout', 'AuthController::logout');
// $route->get('auth/forgot-password', 'AuthController::forgotPassword');
// $route->post('auth/forgot-password', 'AuthController::forgotPassword');
// $route->get('auth/reset-password', 'AuthController::resetPassword');
// $route->post('auth/reset-password', 'AuthController::resetPassword');
  $routes->get('/', 'DashboardController::index', ['filter' => 'auth']);

$routes->group('blog', ['filter' => 'auth'], function($routes) {
  $routes->get('create', 'BlogController::create');
  $routes->post('store', 'BlogController::store');
  // $routes->get('/edit/(:num)', 'BlogController::edit/$1');
  // $routes->post('/update/(:num)', 'BlogController::update/$1');
  // $routes->get('/delete/(:num)', 'BlogController::delete/$1');
  // $routes->get('/(:num)', 'BlogController::show/$1');
});


