<?php

use App\Http\Controllers\Employees\ArticleController;
use App\Http\Controllers\Employees\CategoryController;
use App\Http\Controllers\Employees\DayController;
use App\Http\Controllers\Employees\FacilityController;
use App\Http\Controllers\Employees\MediaController;
use App\Http\Controllers\Employees\OfferController;
use App\Http\Controllers\Employees\PaymentController;
use App\Http\Controllers\Employees\RoomController;
use App\Http\Controllers\Employees\SportController;
use App\Http\Controllers\Employees\SubscriptionController;
use App\Http\Controllers\Employees\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('auth')->group(function (){
    return require_once base_path('routes/auth.php');
});
Route::group(['middleware'=>'auth:sanctum'],function(){
Route::apiResource('sports',SportController::class);
Route::apiResource('articles', ArticleController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('offers', OfferController::class);
Route::apiResource('tags', TagController::class);
Route::apiResource('payments', PaymentController::class);
Route::post('/image',[MediaController::class,'storeImage']);
Route::post('/room',[RoomController::class,'store']);
Route::post('/facility',[FacilityController::class,'store']);
Route::post('/day',[DayController::class,'store']);
Route::post('/accept/{id}',[SubscriptionController::class,'accept']);
Route::post('/suspend',[SubscriptionController::class,'suspend']);
Route::post('/assignOffer/{id}',[SubscriptionController::class,'assignOffer']);
Route::get('/subscriptions',[SubscriptionController::class,'index']);
Route::post('/Subscription/{id}',[SubscriptionController::class,'show']);
});