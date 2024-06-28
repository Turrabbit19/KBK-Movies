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
    // index
    $router->get('/', [\App\Controllers\HomeController::class, "index"]);

    // Genres
    $router->get('list-genre', [\App\Controllers\GenreController::class, "listGenre"]);
    $router->get('add-genre', [\App\Controllers\GenreController::class, "addGenre"]);
    $router->post('post-genre', [\App\Controllers\GenreController::class, "postGenre"]);
    $router->get('del-genre/{id}', [\App\Controllers\GenreController::class, "delGenre"]);
    $router->get('detail-genre/{id}', [\App\Controllers\GenreController::class, "detailGenre"]);
    $router->post('edit-genre/{id}', [\App\Controllers\GenreController::class, "editGenre"]);

    // Languages
    $router->get('list-language', [\App\Controllers\LanguageController::class, "listLanguage"]);
    $router->get('add-language', [\App\Controllers\LanguageController::class, "addLanguage"]);
    $router->post('post-language', [\App\Controllers\LanguageController::class, "postLanguage"]);
    $router->get('del-language/{id}', [\App\Controllers\LanguageController::class, "delLanguage"]);
    $router->get('detail-language/{id}', [\App\Controllers\LanguageController::class,'detailLanguage']);
    $router->post('edit-language/{id}', [\App\Controllers\LanguageController::class,'editLanguage']);

    // Casts
    $router->get('list-cast', [\App\Controllers\CastController::class, "listCast"]);
    $router->get('add-cast', [\App\Controllers\CastController::class, "addCast"]);
    $router->post('post-cast', [\App\Controllers\CastController::class, "postCast"]);
    $router->get('del-cast/{id}', [\App\Controllers\CastController::class, "delCast"]);
    $router->get('detail-cast/{id}', [\App\Controllers\CastController::class,'detailCast']);
    $router->post('edit-cast/{id}', [\App\Controllers\CastController::class,'editCast']);

    // Account
    $router->get('list-account', [\App\Controllers\AccountController::class, "listAccount"]);
    $router->get('lock-account/{id}', [\App\Controllers\AccountController::class, "lockAccount"]);
    $router->get('open-account/{id}', [\App\Controllers\AccountController::class, "openAccount"]);

    // Food Categories
    $router->get('list-foodCate', [\App\Controllers\FoodCateController::class, "listFoodCate"]);
    $router->get('add-foodCate', [\App\Controllers\FoodCateController::class, "addFoodCate"]);
    $router->post('post-foodCate', [\App\Controllers\FoodCateController::class, "postFoodCate"]);
    $router->get('del-foodCate/{id}', [\App\Controllers\FoodCateController::class, "delFoodCate"]);
    $router->get('detail-foodCate/{id}', [\App\Controllers\FoodCateController::class, "detailFoodCate"]);
    $router->post('edit-foodCate/{id}', [\App\Controllers\FoodCateController::class, "editFoodCate"]);

    // Food 
    $router->get('list-food', [\App\Controllers\FoodController::class, "listFood"]);
    $router->get('add-food', [\App\Controllers\FoodController::class, "addFood"]);
    $router->post('post-food', [\App\Controllers\FoodController::class, "postFood"]);
    $router->get('del-food/{id}', [\App\Controllers\FoodController::class, "delFood"]);
    $router->get('detail-food/{id}', [\App\Controllers\FoodController::class, "detailFood"]);
    $router->post('edit-food/{id}', [\App\Controllers\FoodController::class, "editFood"]);

    // Review
    $router->get('list-review', [\App\Controllers\ReviewController::class, "listReview"]);
    $router->get('hidden-review/{id}', [\App\Controllers\ReviewController::class, "hiddenreview"]);
    $router->get('appear-review/{id}', [\App\Controllers\ReviewController::class, "appearreview"]);
$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

echo $response;
?>