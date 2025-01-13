<?php
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserCartController;
use App\Http\Controllers\FavoriteFoodController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderFoodController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\NotificationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('v1')->group(function(){
    // Route::get('posts ',[PostController::class,'index']);
    // Route::post('posts ',[PostController::class,'store']);
    // Route::get('posts/{post}',[PostController::class,'show']);
    // Route::put('posts/{post}',[PostController::class,'update']);
    // Route::delete('posts/{post}',[PostController::class,'destroy']);
   Route::apiResource('posts',PostController::class);
   Route::apiResource('users', UserController::class);
   Route::apiResource('addresses', AddressController::class);
Route::apiResource('restaurants', RestaurantController::class);
Route::apiResource('food-categories', FoodCategoryController::class);
Route::apiResource('foods', FoodController::class);
Route::apiResource('carts', UserCartController::class);
Route::apiResource('favorites', FavoriteFoodController::class);
Route::apiResource('cards', CardController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('order-foods', OrderFoodController::class);
Route::apiResource('chats', ChatController::class);
Route::apiResource('couriers', CourierController::class);
Route::apiResource('notifications', NotificationController::class);
});

