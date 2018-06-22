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
    return view('/layouts/app');
});

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function (){
    return view('register');

})->name('register');

Route::post('/register', '\App\Http\Controllers\Auth\RegisterController@register');


Route::get('/login', function (){
    return view('login');
})->name('login');

Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login');

Route::get('/sucesso', function () {
    return view('sucesso');
})->name('sucesso');

Route::get('/gestao', function()
{
    return view('gestao');
})->name('gestao');

Route::get('/colaboradores','\App\Http\Controllers\ColaboradoresController@selectColaboradores')->name('colaboradores');

Route::post('/colaboradores', '\App\Http\Controllers\ColaboradoresController@insertColaboradores');


Route::get('/home', 'HomeController@index')->name('home');
