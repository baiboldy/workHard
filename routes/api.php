<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
\Illuminate\Support\Facades\Auth::routes();
Route::group(
    ['middleware' => ['auth:api', 'is_admin']],
    function(){
        Route::get('post', [\App\Http\Controllers\Blog\BlogController::class, 'posts']);
    }
);


//Route::get('post', [\App\Http\Controllers\Blog\BlogController::class, 'posts'])->middleware('auth');
Route::get('post/{id}', 'Blog\BlogController@postsId');
Route::post('post', 'Blog\BlogController@postSave');
Route::put('post/{post}', 'Blog\BlogController@postEdit');
Route::delete('post/{post}', 'Blog\BlogController@deletePost');

//Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
//Route::post('registration', [\App\Http\Controllers\AuthController::class, 'register']);
