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


Auth::routes();

Route::get('/test',function (){
    $user = \App\Models\User::all();
    dd($user);
});

Route::group([
    'middleware' => [
        'auth',
        'role:admin'
    ],
    'namespace' => 'Web'
],function (){

    Route::get('/home', 'HomeController@index');

    Route::get('/', function () {
        return view('welcome');
    });

});

