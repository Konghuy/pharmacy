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
    return view('dashbord');
});

Route::get('/Login', function () {
    return view('Login.login');
});


Route::get('/addUser', function () {
    return view('staff.user.addUser');
});
Route::get('/showUser', function () {
    return view('staff.user.showUser');
});

// Route::get('/supplier', 'SupplierController@index');
// Route::get('/supplier/create', 'SupplierController@create');
// Route::post('/supplier', 'SupplierController@store');
// Route::get('/supplier/{id}', 'SupplierController@show');
Route::resource('supplier','SupplierController');

Route::resource('role','RoleController');

Route::resource('category','CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
