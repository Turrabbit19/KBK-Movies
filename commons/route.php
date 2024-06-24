<?php

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});

$router->get('/', [\App\Controllers\HomeController::class, 'index']);

$router->get('list-genre', [\App\Controllers\GenreController::class, 'listGenre']);

$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

echo $response;
?>