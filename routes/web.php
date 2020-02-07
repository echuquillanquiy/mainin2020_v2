<?php

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'administrador'])->namespace('Administrador')->group(function (){

    Route::resource('users', 'UserController');

});