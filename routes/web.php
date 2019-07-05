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

Route::get('/', 'HomeController@index');

Route::get('/test', function(){
    return '<h1>Hola Mundo</h1>';
});

Route::get('/test/2', function(){
    return ['description'=>'Hola',
            'name'=>'Mundo'];
});

Route::get('/dashboard', 'DashBoardController@index');
Route::resource('/reports', 'ExpenseReportsController');
Route::get('/reports/{id}/confirm', 'ExpenseReportsController@confirm_datroy');
Route::get('reports/{report}/expenses/create', 'ExpensesController@create');
Route::post('reports/{report}/expenses/', 'ExpensesController@store');

//Send Mail
Route::get('/reports/{report}/confirmMail', 'ExpenseReportsController@ConfirmSendMail');
Route::post('/reports/{report}/sendMail', 'ExpenseReportsController@sendMail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Profile Routes
Route::get('/profile/{profile}', 'ProfileController@edit');
Route::put('/profile/{profile}/update', 'ProfileController@update');

//Middleware
// Route::get('/', function($user){
//     //
// })->middleware('profile_complete');