<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index');

Route::group(['prefix' => 'api'], function () {
    //Esto lo comentamos por que la ruta va en el api
    //Route::apiResource('posts', 'Api\PostController');
});

//Estas son mis rutas de backend o las normales XD, si quitamos el only por names
Route::middleware('auth')->resource('posts', 'Backend\PostController')->only('index');

Route::get('/home', 'Backend\HomeController@index')->name('home');

Auth::routes();
