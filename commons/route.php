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

    $router->get('/', [\App\Controllers\HomeController::class, "index"]);

    $router->get('list-genre', [\App\Controllers\GenreController::class, "listGenre"]);
    $router->get('add-genre', [\App\Controllers\GenreController::class, "addGenre"]);
    $router->post('post-genre', [\App\Controllers\GenreController::class, "postGenre"]);
    $router->get('del-genre/{id}', [\App\Controllers\GenreController::class, "delGenre"]);
    $router->get('detail-genre/{id}', [\App\Controllers\GenreController::class, "detailGenre"]);
    $router->post('edit-genre/{id}', [\App\Controllers\GenreController::class, "editGenre"]);

$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

echo $response;
?>