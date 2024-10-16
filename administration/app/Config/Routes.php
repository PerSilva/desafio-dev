<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/',   'UploadController::index');

$routes->group('transactions', function($routes){
    $routes->get('/',   'TransactionController::index');
    $routes->get('(:num)',   'TransactionController::getDetailsTransaction/$1');
});