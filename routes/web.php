<?php

Route::get('/', function () {
    return view('welcome');
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
    Route::get('export', 'CollaboratorController@export')->name('exportexcel');
    Route::get('importardata', 'CollaboratorController@importData')->name('dataimport');
    Route::post('import-data', 'CollaboratorController@import')->name('importexcel');
});