<?php

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
    return Redirect::to('home');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::post('logout', function (){
	return Auth::logout();
});
Route::resource('update/user', 'UserController', ['only' => ['update']]);

Auth::routes();
