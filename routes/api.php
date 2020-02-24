<?php

Route::get('/department/{id}/provinces', 'Administrador\ProvinceController@byDepartment');
Route::get('/province/{id}/district', 'Administrador\DistrictController@byProvince');