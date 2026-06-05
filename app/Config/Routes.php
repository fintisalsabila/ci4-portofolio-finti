<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Portfolio::index');
$routes->post('/submit-interest', 'Portfolio::submitInterest');

// Admin routes
$routes->group('admin', ['filter' => 'login'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('/portfolios', 'Admin::portfolios');
    $routes->get('/clients', 'Admin::clients');
    $routes->get('/tech-stacks', 'Admin::techStacks');
    $routes->post('/portfolio/save', 'Admin::savePortfolio');
    $routes->delete('/portfolio/(:num)', 'Admin::deletePortfolio/$1');
});