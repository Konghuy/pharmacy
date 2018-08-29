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
//     return view('dashbord');
// });

Route::get('/Login', function () {
    return view('Login.login');
});


Route::get('/addUser', function () {
    return view('staff.user.addUser');
});
Route::get('/showUser', function () {
    return view('staff.user.showUser');
});

Route::resource('supplier','SupplierController');

Route::resource('role','RoleController');

Route::resource('category','CategoryController');

Route::resource('package','PackageController');

Route::resource('rank','RankController');

Route::resource('medication','MedicationController');

Route::resource('payment','PaymentController');

Route::resource('purchase','PurchaseController');
Route::post('/purchase/fetch','PurchaseController@fetch')->name('purchase.fetch');
Route::post('/purchase/add','PurchaseController@add')->name('purchase.add');
Route::post('/purchase/store','PurchaseController@store')->name('purchase.store');

Route::resource('pos','POSController');
Route::post('/pos/fetch','POSController@fetch')->name('pos.fetch');
Route::post('/pos/add','POSController@add')->name('pos.add');
Route::post('/pos/store','POSController@store')->name('pos.store');

Route::get('/','DefultController@dashboard');
Route::get('/stockInfo','DefultController@stock');
Route::get('/expired','DefultController@expired');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
