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
     $router->get('list-accountAppear', [\App\Controllers\AccountController::class, "listAccountAppear"]);
     $router->get('list-accountHidden', [\App\Controllers\AccountController::class, "listAccountHidden"]);
     $router->get('lock-account/{id}', [\App\Controllers\AccountController::class, "hiddenAccount"]);
     $router->get('open-account/{id}', [\App\Controllers\AccountController::class, "appearAccount"]);
 
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

      // Photos
    $router->get('list-photo', [\App\Controllers\PhotoController::class, "index"]);
    $router->get('add-photo', [\App\Controllers\PhotoController::class, "add"]);
    $router->post('post-photo', [\App\Controllers\PhotoController::class, "post"]);
    $router ->get('del-photo/{id}', [\App\Controllers\PhotoController::class, "delete"]);
    $router->get('detail-photo/{id}', [\App\Controllers\PhotoController::class, "detail"]);
    $router->post('edit-photo/{id}', [\App\Controllers\PhotoController::class, "edit"]);

    // Movies
    $router->get('list-movie', [\App\Controllers\MovieController::class, "listMovie"]);
    $router->get('add-movie', [\App\Controllers\MovieController::class, "addMovie"]);
    $router->post('post-movie', [\App\Controllers\MovieController::class, "postMovie"]);
    $router->get('del-movie/{id}', [\App\Controllers\MovieController::class, "delMovie"]);
    $router->get('detail-movie/{id}', [\App\Controllers\MovieController::class, "detailMovie"]);
    $router->post('edit-movie/{id}', [\App\Controllers\MovieController::class, "editMovie"]);

    // Movie_Genre
    $router->get('list-movGen', [\App\Controllers\MovieGenreController::class, "index"]);
    $router->get('add-movGen', [\App\Controllers\MovieGenreController::class, "add"]);
    $router->post('post-movGen', [\App\Controllers\MovieGenreController::class, "post"]);
    $router ->get('del-movGen/{id}', [\App\Controllers\MovieGenreController::class, "delete"]);
    $router->get('detail-movGen/{id}', [\App\Controllers\MovieGenreController::class, "detail"]);
    $router->post('edit-movGen/{id}', [\App\Controllers\MovieGenreController::class, "edit"]);

    // Movie_Language
    $router->get('list-movLan', [\App\Controllers\MovieLanguangeController::class, "index"]);
    $router->get('add-movLan', [\App\Controllers\MovieLanguangeController::class, "add"]);
    $router->post('post-movLan', [\App\Controllers\MovieLanguangeController::class, "post"]);
    $router ->get('del-movLan/{id}', [\App\Controllers\MovieLanguangeController::class, "delete"]);
    $router->get('detail-movLan/{id}', [\App\Controllers\MovieLanguangeController::class, "detail"]);
    $router->post('edit-movLan/{id}', [\App\Controllers\MovieLanguangeController::class, "edit"]);

    // Movie_Cast
    $router->get('list-movCas', [\App\Controllers\MovieCastController::class, "index"]);
    $router->get('add-movCas', [\App\Controllers\MovieCastController::class, "add"]);
    $router->post('post-movCas', [\App\Controllers\MovieCastController::class, "post"]);
    $router ->get('del-movCas/{id}', [\App\Controllers\MovieCastController::class, "delete"]);
    $router->get('detail-movCas/{id}', [\App\Controllers\MovieCastController::class, "detail"]);
    $router->post('edit-movCas/{id}', [\App\Controllers\MovieCastController::class, "edit"]);

    // Coupons
    $router ->get('list-coupon', [\App\Controllers\CouponController::class, "listCoupon"]);
    $router ->get('add-coupon', [\App\Controllers\CouponController::class, "addCoupon"]);
    $router ->post('post-coupon', [\App\Controllers\CouponController::class, "postCoupon"]);
    $router ->get('del-coupon/{id}', [\App\Controllers\CouponController::class, "delCoupon"]);
    $router ->get('detail-coupon/{id}', [\App\Controllers\CouponController::class, "detailCoupon"]);
    $router ->post('edit-coupon/{id}', [\App\Controllers\CouponController::class, "editCoupon"]);
$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

echo $response;
?>