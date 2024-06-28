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

    //Movie
    $router->get('list-movie', [\App\Controllers\MovieController::class, "listMovie"]);
    $router->get('add-movie', [\App\Controllers\MovieController::class, "addMovie"]);
    $router->post('post-movie', [\App\Controllers\MovieController::class, "postMovie"]);
    $router->get('del-movie/{id}', [\App\Controllers\MovieController::class, "delMovie"]);
    $router->get('detail-movie/{id}', [\App\Controllers\MovieController::class, "detailMovie"]);
    $router->post('edit-movie/{id}', [\App\Controllers\MovieController::class, "editMovie"]);

    //Coupons
    $router ->get('list-coupon', [\App\Controllers\CouponController::class, "listCoupon"]);
    $router ->get('add-coupon', [\App\Controllers\CouponController::class, "addCoupon"]);
    $router ->post('post-coupon', [\App\Controllers\CouponController::class, "postCoupon"]);
    $router ->get('del-coupon/{id}', [\App\Controllers\CouponController::class, "delCoupon"]);
    $router ->get('detail-coupon/{id}', [\App\Controllers\CouponController::class, "detailCoupon"]);
    $router ->post('edit-coupon/{id}', [\App\Controllers\CouponController::class, "editCoupon"]);
   
    //Seat_Types
    $router ->get('list-seat-type', [\App\Controllers\SeatTypeController::class, "listSeatType"]);
    $router ->get('add-seat-type', [\App\Controllers\SeatTypeController::class, "addSeatType"]);
    $router ->post('post-seat-type', [\App\Controllers\SeatTypeController::class, "postSeatType"]);
    $router ->get('del-seat-type/{id}', [\App\Controllers\SeatTypeController::class, "delSeatType"]);
    $router ->get('detail-seat-type/{id}', [\App\Controllers\SeatTypeController::class, "detailSeatType"]);
    $router ->post('edit-seat-type/{id}', [\App\Controllers\SeatTypeController::class, "editSeatType"]);
   
$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

echo $response;
?>