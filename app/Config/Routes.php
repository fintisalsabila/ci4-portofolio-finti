<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Portfolio::index');
$routes->post('/submit-interest', 'Portfolio::submitInterest');

// Admin routes (untuk dashboard admin)
$routes->group('admin', ['filter' => 'login'], function($routes) {
    $routes->get('/', 'Admin::dashboard');
    $routes->get('portfolios', 'Admin::portfolios');
    $routes->get('clients', 'Admin::clients');
    $routes->get('tech-stacks', 'Admin::techStacks');
});