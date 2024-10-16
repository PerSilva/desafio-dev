<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->post('upload',  'UploadController::saveTransaction');

$routes->group('transactions', function($routes){
    $routes->get('/',       'TransactionController::index');
    $routes->get('(:num)',  'TransactionController::getDetailsTransaction/$1');
});
