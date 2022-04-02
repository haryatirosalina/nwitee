<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('nwitee', [
        "title" => "Nwitee"
    ]);
});
Route::get('/login', function () {
    return view('login', [
        "title" => "Login"
    ]);
});
Route::get('/register', function () {
    return view('register', [
        "title" => "Register"
    ]);
});
Route::get('/profile', function () {
    return view('profile', [
        "title" => "Profile"
    ]);
});
// Route::get('/forum/forum', function () {
//     return view('forum.forum', [
//         "title" => "Forum"
//     ]);
// });
Route::get('/chat', function () {
    return view('chat', [
        "title" => "Chat"
    ]);
});
Route::get('/connection', function () {
    return view('connection', [
        "title" => "Connection"
    ]);
});

Route::get('/nwitee', 'App\Http\Controllers\LoginController@index');

Route::post('/login', 'App\Http\Controllers\LoginController@login');
// Route::post('/logout', 'App\Http\Controllers\LoginController@logout');

Route::get('/register', 'App\Http\Controllers\RegisterController@index');
Route::post('/create_accounts', 'App\Http\Controllers\RegisterController@indexRegisterStore');

//web
Route::get('/forum', 'App\Http\Controllers\forumController@index');
Route::get('/createForum', 'App\Http\Controllers\forumController@createForum');
Route::post('/createForum', 'App\Http\Controllers\forumController@indexCreateStore');
//API
//Route::resource('/api/forum', 'App\Http\Controllers\forumsController@index');
//Route::get('api/createForum', 'App\Http\Controllers\forumsController@createForum');
//Route::post('api/createForum', 'App\Http\Controllers\forumsController@indexCreateStore');

//Route::get('/editForum/{$id}', 'App\Http\Controllers\forumController@show');
Route::get('{id}/editForum', 'App\Http\Controllers\forumController@show');
Route::get('editForum/{id}', 'App\Http\Controllers\forumController@edit');
Route::put('/update/{id}', 'App\Http\Controllers\forumController@update');

Route::get('/destroy/{id}', 'App\Http\Controllers\forumController@destroy');

// Route::get('/home', 'App\Http\Controllers\RegisterController@home')->middleware('auth');
Route::group(['middleware'=>['auth','checkrole:student']], function(){
    Route::get('/home', 'App\Http\Controllers\HomeController@index');

});
Route::get('/profile', 'App\Http\Controllers\UserController@profile');
Route::post('/profile', 'App\Http\Controllers\UserController@update_avatar');

Route::prefix('/profile')->group(function () {
    Route::put('/update', [UserController::class, 'update'])->name('profile.update');
});
Route::get('/editProfile', 'App\Http\Controllers\UserController@edit');

Route::get('/detailForum/{id}', 'App\Http\Controllers\forumController@detail');
Route::get('/addDiscuss', 'App\Http\Controllers\forumController@addDiscuss');
Route::post('/addDiscuss', 'App\Http\Controllers\forumController@Store');

// Auth::routes(['verify' => true]);
// Route::get('profile', function () {
//     // Only verified users may enter...
// })->middleware('verified');

Route::get('/home', 'App\Http\Controllers\PostController@index')->name('home');
Route::get('/createPost', 'App\Http\Controllers\PostController@createPost');
Route::post('/createPost', 'App\Http\Controllers\PostController@indexCreateStore');
Route::get('/delete/{id}', 'App\Http\Controllers\PostController@destroy');
Route::get('editPost/{id}', 'App\Http\Controllers\PostController@edit');
Route::put('/update/{id}', 'App\Http\Controllers\PostController@update');

// Route::get('editPost/{id}', 'App\Http\Controllers\PostController@comment');
// Route::put('/update/{id}', 'App\Http\Controllers\PostController@update');

//comment
Route::post('comments/{post_id}', ['uses' => 'App\Http\Controllers\CommentsController@store', 'as' => 'comments.store']);
// Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::get('/delete_comment/{id}', 'App\Http\Controllers\CommentsController@destroy');
Route::get('comment/{id}', ['uses' => 'App\Http\Controllers\CommentsController@edit', 'as' => 'comments.edit']);
Route::put('/comments/{id}', ['uses' => 'App\Http\Controllers\CommentsController@update', 'as' => 'comments.update']);


//like or dislike
Route::post('save-likedislike', 'App\Http\Controllers\PostController@save_likedislike')->name('like.dislike');