<?php



Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/about', 'PageController@about')->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');

Route::get('/admin/reservations', 'Admin\ReservationController@index')->name('admin.reservations.index');
Route::get('/admin/reservations/create', 'Admin\ReservationController@create')->name('admin.reservations.create');
Route::get('/admin/reservations/{id}', 'Admin\ReservationController@show')->name('admin.reservations.show');
Route::post('/admin/reservations/store', 'Admin\ReservationController@store')->name('admin.reservations.store');
Route::get('/admin/store/{id}/edit', 'Admin\ReservationController@edit')->name('admin.reservations.edit');
Route::put('/admin/reservations/{id}', 'Admin\ReservationController@update')->name('admin.reservations.update');
Route::delete('/admin/reservations/{id}/destroy', 'Admin\ReservationController@destroy')->name('admin.reservations.destroy');

Route::get('/user/reservations', 'User\ReservationController@index')->name('user.reservations.index');
Route::get('/user/reservations/create', 'User\ReservationController@create')->name('user.reservations.create');
Route::get('/user/reservations/{id}', 'User\ReservationController@show')->name('user.reservations.show');
Route::post('/user/reservations/store', 'User\ReservationController@store')->name('user.reservations.store');
Route::get('/user/store/{id}/edit', 'User\ReservationController@edit')->name('user.reservations.edit');
Route::put('/user/reservations/{id}', 'User\ReservationController@update')->name('user.reservations.update');
Route::delete('/user/reservations/{id}/destroy', 'User\ReservationController@destroy')->name('user.reservations.destroy');

Route::get('/user/restaurants', 'User\RestaurantController@index')->name('user.restaurants.index');
Route::get('/user/restaurants/{id}', 'User\RestaurantController@show')->name('user.restaurants.show');

Route::get('/welcome','SearchController@index')->name('welcome');
Route::get('/welcome/action','SearchController@action')->name('welcome.action');


Route::get ( 'welcome/searchResults','SearchController@searchResults')->name('welcome.searchResults');
