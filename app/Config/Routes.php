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
// $routes->get('dashboard', 'DashboardController::index');

$routes->group('dashboard', ['filter' => 'auth'], function($routes) {
  $routes->get('/', 'DashboardController::index');
  $routes->get('blogs/create', 'BlogController::create');
  $routes->post('blogs/store', 'BlogController::store');
});

