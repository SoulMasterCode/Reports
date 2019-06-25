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
