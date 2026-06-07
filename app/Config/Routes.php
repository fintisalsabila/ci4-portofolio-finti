<?php

use CodeIgniter\Router\RouteCollection;

// Frontend routes
$routes->get('/', 'Portfolio::index');
$routes->post('/submit-interest', 'Portfolio::submitInterest');

// Auth routes
$routes->group('auth', function($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::doLogin');
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::doRegister');
    $routes->get('forgot-password', 'Auth::forgotPassword');
    $routes->post('forgot-password', 'Auth::doForgotPassword');
    $routes->get('reset-password/(:any)', 'Auth::resetPassword/$1');
    $routes->post('reset-password', 'Auth::doResetPassword');
    $routes->get('logout', 'Auth::logout');
});

// Admin routes (protected)
$routes->group('admin', ['filter' => 'login'], function($routes) {
    $routes->get('/', 'Admin::index');
    
    // API endpoints
    $routes->post('project/save', 'Admin::saveProject');
    $routes->post('project/update/(:num)', 'Admin::updateProject/$1');
    $routes->delete('project/delete/(:num)', 'Admin::deleteProject/$1');
    
    $routes->post('skill/save', 'Admin::saveSkill');
    $routes->delete('skill/delete/(:num)', 'Admin::deleteSkill/$1');
    
    $routes->post('cert/save', 'Admin::saveCertification');
    $routes->delete('cert/delete/(:num)', 'Admin::deleteCertification/$1');
    
    $routes->post('experience/save', 'Admin::saveExperience');
    $routes->delete('experience/delete/(:num)', 'Admin::deleteExperience/$1');
    
    $routes->post('inquiry/status/(:num)', 'Admin::updateInquiryStatus/$1');
    $routes->delete('inquiry/delete/(:num)', 'Admin::deleteInquiry/$1');
    
    $routes->post('profile/update', 'Admin::updateProfile');
    $routes->post('profile/change-password', 'Admin::changePassword');
});