<?php

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'administrador'])->namespace('Administrador')->group(function (){

    Route::resource('users', 'UserController');
    Route::resource('positions', 'PositionController');
    Route::resource('companies', 'CompanyController');
    Route::resource('categories', 'CategoryController');
    Route::resource('amounts', 'AmountController');
});