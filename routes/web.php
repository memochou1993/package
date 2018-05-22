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

Route::get('/home', 'HomeController@index')->name('home');

/* Packages */
Route::resource('packages', 'PackageController', ['except' => ['show']]);
Route::prefix('packages')->group(function () {
    Route::get('/{package_login}', 'PackageController@list')->name('packages.list');
    Route::get('/{package_login}/{package_name}', 'PackageController@show')->name('packages.show');
});
Route::resource('packages.contributors', 'ContributorController', ['only' => ['create', 'store', 'delete']]);
Route::resource('packages.tags', 'TagController', ['only' => ['create', 'store', 'delete']]);

/* Contributors */
Route::resource('contributors', 'ContributorController', ['only' => ['index', 'store', 'delete']]);
Route::get('/contributors/{contributor_login}', 'ContributorController@show')->name('contributors.show');

/* Tags */
Route::resource('tags', 'TagController', ['only' => ['index', 'store', 'delete']]);
Route::get('/tags/{tag_name}', 'TagController@show')->name('tags.show');
