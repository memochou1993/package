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

Route::resource('packages', 'PackageController', ['except' => ['show', 'edit']]);

Route::get('/packages/{package_login}', 'PackageController@list')->name('packages.list');
Route::get('/packages/{package_login}/{package_name}', 'PackageController@show')->name('packages.show');

Route::resource('contributors', 'ContributorController', ['only' => ['index', 'show']]);
Route::get('/contributors/{contributor_login}', 'ContributorController@show')->name('contributors.show');
