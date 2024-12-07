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
$routes->get('auth/forgotPassword', 'AuthController::forgotPassword');
$routes->post('auth/forgotPassword', 'AuthController::forgotPassword');
$routes->get('auth/resetPassword', 'AuthController::showResetForm');
$routes->post('auth/resetPassword', 'AuthController::resetPassword');
$routes->get('/', 'DashboardController::index');
$routes->get('/myBlogs', 'DashboardController::myBlogs', ['filter' => 'auth']);
$routes->get('/byCategory/(:num)', 'DashboardController::getBlogsByCategory/$1');

$routes->group('blogs', ['filter' => 'auth'], function($routes) {
  $routes->get('create', 'BlogController::create');
  $routes->post('store', 'BlogController::store');
  $routes->get('edit/(:num)', 'BlogController::edit/$1');
  $routes->post('update/(:num)', 'BlogController::update/$1');
  $routes->get('delete/(:num)', 'BlogController::delete/$1');
  $routes->get('show/(:num)', 'BlogController::show/$1');
});

$routes->group('comments', ['filter' => 'auth'], function($routes) {
  $routes->post('store/(:num)', 'CommentController::store/$1');
  $routes->get('delete/(:num)', 'CommentController::delete/$1');
  $routes->post('addReplay', 'CommentController::addReply');
});


$routes->get('/email', 'DashboardController::emailTemp');