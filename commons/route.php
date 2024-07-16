<?php

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});

$router->group(['prefix' => 'admin'], function($router) {
    // index
    $router->get('/', [\App\Admin\controllers\HomeController::class, "index"]);

    // Genres
    $router->get('list-genre', [\App\Admin\controllers\GenreController::class, "listGenre"]);
    $router->get('add-genre', [\App\Admin\controllers\GenreController::class, "addGenre"]);
    $router->post('post-genre', [\App\Admin\controllers\GenreController::class, "postGenre"]);
    $router->get('del-genre/{id}', [\App\Admin\controllers\GenreController::class, "delGenre"]);
    $router->get('detail-genre/{id}', [\App\Admin\controllers\GenreController::class, "detailGenre"]);
    $router->post('edit-genre/{id}', [\App\Admin\controllers\GenreController::class, "editGenre"]);

    // Languages
    $router->get('list-language', [\App\Admin\controllers\LanguageController::class, "listLanguage"]);
    $router->get('add-language', [\App\Admin\controllers\LanguageController::class, "addLanguage"]);
    $router->post('post-language', [\App\Admin\controllers\LanguageController::class, "postLanguage"]);
    $router->get('del-language/{id}', [\App\Admin\controllers\LanguageController::class, "delLanguage"]);
    $router->get('detail-language/{id}', [\App\Admin\controllers\LanguageController::class,'detailLanguage']);
    $router->post('edit-language/{id}', [\App\Admin\controllers\LanguageController::class,'editLanguage']);

    // Casts
    $router->get('list-cast', [\App\Admin\controllers\CastController::class, "listCast"]);
    $router->get('add-cast', [\App\Admin\controllers\CastController::class, "addCast"]);
    $router->post('post-cast', [\App\Admin\controllers\CastController::class, "postCast"]);
    $router->get('del-cast/{id}', [\App\Admin\controllers\CastController::class, "delCast"]);
    $router->get('detail-cast/{id}', [\App\Admin\controllers\CastController::class,'detailCast']);
    $router->post('edit-cast/{id}', [\App\Admin\controllers\CastController::class,'editCast']);

     // Account
     $router->get('list-accountAppear', [\App\Admin\controllers\AccountController::class, "listAccountAppear"]);
     $router->get('list-accountHidden', [\App\Admin\controllers\AccountController::class, "listAccountHidden"]);
     $router->get('lock-account/{id}', [\App\Admin\controllers\AccountController::class, "hiddenAccount"]);
     $router->get('open-account/{id}', [\App\Admin\controllers\AccountController::class, "appearAccount"]);
 
     // Food Categories
     $router->get('list-foodCate', [\App\Admin\controllers\FoodCateController::class, "listFoodCate"]);
     $router->get('add-foodCate', [\App\Admin\controllers\FoodCateController::class, "addFoodCate"]);
     $router->post('post-foodCate', [\App\Admin\controllers\FoodCateController::class, "postFoodCate"]);
     $router->get('del-foodCate/{id}', [\App\Admin\controllers\FoodCateController::class, "delFoodCate"]);
     $router->get('detail-foodCate/{id}', [\App\Admin\controllers\FoodCateController::class, "detailFoodCate"]);
     $router->post('edit-foodCate/{id}', [\App\Admin\controllers\FoodCateController::class, "editFoodCate"]);
 
     // Food 
     $router->get('list-food', [\App\Admin\controllers\FoodController::class, "listFood"]);
     $router->get('add-food', [\App\Admin\controllers\FoodController::class, "addFood"]);
     $router->post('post-food', [\App\Admin\controllers\FoodController::class, "postFood"]);
     $router->get('del-food/{id}', [\App\Admin\controllers\FoodController::class, "delFood"]);
     $router->get('detail-food/{id}', [\App\Admin\controllers\FoodController::class, "detailFood"]);
     $router->post('edit-food/{id}', [\App\Admin\controllers\FoodController::class, "editFood"]);
 
     // Review
     $router->get('list-review', [\App\Admin\controllers\ReviewController::class, "listReview"]);
     $router->get('hidden-review/{id}', [\App\Admin\controllers\ReviewController::class, "hiddenreview"]);
     $router->get('appear-review/{id}', [\App\Admin\controllers\ReviewController::class, "appearreview"]);

      // Photos
    $router->get('list-photo', [\App\Admin\controllers\PhotoController::class, "index"]);
    $router->get('add-photo', [\App\Admin\controllers\PhotoController::class, "add"]);
    $router->post('post-photo', [\App\Admin\controllers\PhotoController::class, "post"]);
    $router ->get('del-photo/{id}', [\App\Admin\controllers\PhotoController::class, "delete"]);
    $router->get('detail-photo/{id}', [\App\Admin\controllers\PhotoController::class, "detail"]);
    $router->post('edit-photo/{id}', [\App\Admin\controllers\PhotoController::class, "edit"]);

    // Movies
    $router->get('list-movie', [\App\Admin\controllers\MovieController::class, "listMovie"]);
    $router->get('add-movie', [\App\Admin\controllers\MovieController::class, "addMovie"]);
    $router->post('post-movie', [\App\Admin\controllers\MovieController::class, "postMovie"]);
    $router->get('del-movie/{id}', [\App\Admin\controllers\MovieController::class, "delMovie"]);
    $router->get('detail-movie/{id}', [\App\Admin\controllers\MovieController::class, "detailMovie"]);
    $router->post('edit-movie/{id}', [\App\Admin\controllers\MovieController::class, "editMovie"]);

    // Movie_Genre
    $router->get('list-movGen', [\App\Admin\controllers\MovieGenreController::class, "index"]);
    $router->get('add-movGen', [\App\Admin\controllers\MovieGenreController::class, "add"]);
    $router->post('post-movGen', [\App\Admin\controllers\MovieGenreController::class, "post"]);
    $router ->get('del-movGen/{id}', [\App\Admin\controllers\MovieGenreController::class, "delete"]);
    $router->get('detail-movGen/{id}', [\App\Admin\controllers\MovieGenreController::class, "detail"]);
    $router->post('edit-movGen/{id}', [\App\Admin\controllers\MovieGenreController::class, "edit"]);

    // Movie_Language
    $router->get('list-movLan', [\App\Admin\controllers\MovieLanguangeController::class, "index"]);
    $router->get('add-movLan', [\App\Admin\controllers\MovieLanguangeController::class, "add"]);
    $router->post('post-movLan', [\App\Admin\controllers\MovieLanguangeController::class, "post"]);
    $router ->get('del-movLan/{id}', [\App\Admin\controllers\MovieLanguangeController::class, "delete"]);
    $router->get('detail-movLan/{id}', [\App\Admin\controllers\MovieLanguangeController::class, "detail"]);
    $router->post('edit-movLan/{id}', [\App\Admin\controllers\MovieLanguangeController::class, "edit"]);

    // Movie_Cast
    $router->get('list-movCas', [\App\Admin\controllers\MovieCastController::class, "index"]);
    $router->get('add-movCas', [\App\Admin\controllers\MovieCastController::class, "add"]);
    $router->post('post-movCas', [\App\Admin\controllers\MovieCastController::class, "post"]);
    $router ->get('del-movCas/{id}', [\App\Admin\controllers\MovieCastController::class, "delete"]);
    $router->get('detail-movCas/{id}', [\App\Admin\controllers\MovieCastController::class, "detail"]);
    $router->post('edit-movCas/{id}', [\App\Admin\controllers\MovieCastController::class, "edit"]);

    // Coupons
    $router ->get('list-coupon', [\App\Admin\controllers\CouponController::class, "listCoupon"]);
    $router ->get('add-coupon', [\App\Admin\controllers\CouponController::class, "addCoupon"]);
    $router ->post('post-coupon', [\App\Admin\controllers\CouponController::class, "postCoupon"]);
    $router ->get('del-coupon/{id}', [\App\Admin\controllers\CouponController::class, "delCoupon"]);
    $router ->get('detail-coupon/{id}', [\App\Admin\controllers\CouponController::class, "detailCoupon"]);
    $router ->post('edit-coupon/{id}', [\App\Admin\controllers\CouponController::class, "editCoupon"]);

    //Seat_Types
    $router ->get('list-seat-type', [\App\Admin\controllers\SeatTypeController::class, "listSeatType"]);
    $router ->get('add-seat-type', [\App\Admin\controllers\SeatTypeController::class, "addSeatType"]);
    $router ->post('post-seat-type', [\App\Admin\controllers\SeatTypeController::class, "postSeatType"]);
    $router ->get('del-seat-type/{id}', [\App\Admin\controllers\SeatTypeController::class, "delSeatType"]);
    $router ->get('detail-seat-type/{id}', [\App\Admin\controllers\SeatTypeController::class, "detailSeatType"]);
    $router ->post('edit-seat-type/{id}', [\App\Admin\controllers\SeatTypeController::class, "editSeatType"]);
   
    //rooms
    $router ->get('list-room', [\App\Admin\controllers\RoomController::class, "listRoom"]);
    $router ->get('add-room', [\App\Admin\controllers\RoomController::class, "addRoom"]);
    $router ->post('post-room', [\App\Admin\controllers\RoomController::class, "postRoom"]);
    $router ->get('del-room/{id}', [\App\Admin\controllers\RoomController::class, "delRoom"]);
    $router ->get('detail-room/{id}', [\App\Admin\controllers\RoomController::class, "getDetailRoom"]);
    $router ->post('edit-room/{id}', [\App\Admin\controllers\RoomController::class, "editRoom"]);

    //seats
    $router ->get('list-seat', [\App\Admin\controllers\SeatController::class, "listSeat"]);
    $router ->get('add-seat', [\App\Admin\controllers\SeatController::class, "addSeat"]);
    $router ->post('post-seat', [\App\Admin\controllers\SeatController::class, "postSeat"]);
    $router ->get('del-seat/{id}', [\App\Admin\controllers\SeatController::class, "delSeat"]);
    $router ->get('detail-seat/{id}', [\App\Admin\controllers\SeatController::class, "detailSeat"]);
    $router ->post('edit-seat/{id}', [\App\Admin\controllers\SeatController::class, "editSeat"]);

    //showtimes
    $router ->get('list-showtime',[\App\Admin\controllers\ShowTimeController::class, "listShowTime"]);
    $router ->get('add-showtime',[\App\Admin\controllers\ShowTimeController::class, "addShowTime"]);
    $router ->post('post-showtime',[\App\Admin\controllers\ShowTimeController::class, "postShowTime"]);
    $router ->get('del-showtime/{id}',[\App\Admin\controllers\ShowTimeController::class, "delShowTime"]);
    $router ->get('detail-showtime/{id}',[\App\Admin\controllers\ShowTimeController::class, "getDetailShowTime"]);
    $router ->post('edit-showtime/{id}',[\App\Admin\controllers\ShowTimeController::class, "editShowTime"]);

    // Bills
    $router ->get('list-bill',[\App\Admin\controllers\BillController::class, "listBill"]);
    $router ->get('del-bill/{id}',[\App\Admin\controllers\BillController::class, "delBill"]);

    // Booking
    $router ->get('list-booking',[\App\Admin\controllers\BookingController::class, "listBooking"]);
    $router ->get('del-booking/{id}',[\App\Admin\controllers\BookingController::class, "delBooking"]);
});


$router->group(['prefix' => ''], function($router) {
    $router->get('/', [\App\Client\controllers\HomeController::class, "index"]);
});

$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

echo $response;