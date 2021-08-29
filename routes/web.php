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

// Route::get('/', function () {
//     return view('welcome');
// });

//route login
Route::get('/', function () {
	
    return view('login');
})->name('login')->middleware('guest'); //middle ware guest buat yg blom login

Route::get('/admin', function () {
	
    return view('dashboard-admin');
})->name('dashboard-admin')->middleware(['admin', 'auth']); //middle ware admin dan auth buat yg blom cegah yang bisa hanya admin


Route::get('/kader', function () {
	
    return view('dashboard-kader');
})->name('dashboard-kader')->middleware(['kader','auth']); // hanya kader

//route proses login
Route::post('proses-login','AuthController@prosesLogin')->name('proses-login')->middleware('guest');

//route logout

Route::get('logout-kader', 'AuthController@logout')->name('logout-kader')->middleware(['kader', 'auth']);// hanya kader
Route::get('logout-admin', 'AuthController@logout')->name('logout-admin')->middleware(['admin', 'auth']);// hanya admin

//route register
Route::get('register', function(){
	return view('register');
})->name('register')->middleware('guest');

//route proses register
Route::post('proses-register', 'AuthController@register')->name('proses-register')->middleware('guest');