<?php

require __DIR__ . '/../vendor/autoload.php';

use Bramus\Router\Router;

$router = new Router;
$router->setNamespace('\App\Controllers');

// Define all routes for our application below:
$router->get('/{currency}/{startDate}/{endDate}/', 'CurrencyRatesController@averageBuyRateBetweenDates');

// Handle request and run application
$router->run();