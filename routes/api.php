<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIController as APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'App\Http\Controllers\API\AuthController@login');
Route::post('register', 'App\Http\Controllers\API\AuthController@register');
Route::middleware('auth:api')->group(function () {
    Route::get('logout', 'App\Http\Controllers\API\AuthController@logout');
    Route::resource('forum', App\Http\Controllers\API\ForumController::class);
    Route::resource('home', App\Http\Controllers\API\PostController::class);
    Route::post('add-post/{id}', 'App\Http\Controllers\API\PostController@store');
    Route::patch('add-comment/{id}', 'App\Http\Controllers\API\CommentController@store');


    Route::resource('home', App\Http\Controllers\API\CommentController::class);
});


