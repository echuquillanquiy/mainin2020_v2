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
    Route::resource('areas', 'AreaController');

    Route::resource('collaborators', 'CollaboratorController');
    Route::post('/collaborators/{collaborator}', 'CollaboratorController@show')->name('ver-foto');
    Route::get('collabortors/export/', 'CollaboratorController@export')->name('exportexcel');
    Route::post('/import-data-excel', 'CollaboratorController@importData')->name('collaborators.import.excel');
});