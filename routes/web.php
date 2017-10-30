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



Route::resource('member','MembersController', [
  'names' => [
    'index' => 'members.index',
    'create' => 'members.create',
    'store' => 'members.store',
    'edit' => 'members.edit',
    'update' => 'members.update',
    'destroy' => 'members.destroy'
  ]
]);

Route::resource('book','BooksController', [
  'names' => [
    'index' => 'books.index',
    'create' => 'books.create',
    'store' => 'books.store',
    'edit' => 'books.edit',
    'update' => 'books.update',
    'destroy' => 'books.destroy'
  ]
]);

Route::get('/', 'RentalsController@index');
Route::resource('rental','RentalsController', [
  'names' => [
    'create' => 'rentals.create',
    'store' => 'rentals.store',
    'edit' => 'rentals.edit',
    'update' => 'rentals.update',
    'show' => 'rentals.show',
    'destroy' => 'rentals.destroy'
  ]
]);
