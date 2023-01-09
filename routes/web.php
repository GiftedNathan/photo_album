<?php

use Illuminate\Routing\RouteAction;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/albums', 'AlbumsController@index');
Route::get('/albums/create', 'AlbumsController@create');
Route::post('/albums', 'AlbumsController@store');
Route::get('/albums/{album}', 'AlbumsController@show');
Route::get('/albums/{album}/edit', 'AlbumsController@edit');
Route::put('/albums/{album}', 'AlbumsController@update');
Route::delete('/albums/{album}', 'AlbumsController@destroy');


Route::get('/photos/create/{album_id}', 'PhotosController@create');
Route::post('/photos/store', 'PhotosController@store');
Route::get('/photos/{photo}', 'PhotosController@show');
Route::get('/photos/{photo}/edit', 'PhotosController@edit');
Route::put('/photos/{photo}', 'PhotosController@update');
Route::delete('/photos/{photo}', 'PhotosController@destroy');






