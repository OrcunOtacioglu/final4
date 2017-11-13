<?php

Route::get('/', 'ApplicationController@index');

Auth::routes();
Route::get('/home', function () {
    return redirect()->action('ApplicationController@dashboard');
});

/**
 * WEB-UI ROUTES
 */
Route::get('/hotel', 'HotelController@all');
Route::get('/hotel/{name}', 'HotelController@show');
Route::resource('/order', 'OrderController');
Route::get('/complete-order/{reference}', 'OrderController@completeOrder');
Route::post('/order-complete', 'OrderController@validatePayment');
Route::get('/page/{slug}', 'PageController@show');

/**
 * DASHBOARD ROUTES
 */
Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function () {
    Route::get('/', 'ApplicationController@dashboard')->name('dashboard');
    Route::resource('/hotel', 'HotelController', ['except' => 'show']);
    Route::resource('/room', 'HotelRoomController', ['except' => 'show']);
    Route::resource('/rate', 'RateController');
    Route::resource('/zone', 'ZoneController');
    Route::resource('/page', 'PageController', ['except' => 'show']);
    Route::resource('/settings', 'SettingsController');
    Route::resource('/role', 'RoleController', ['except' => 'show']);
    Route::resource('/user', 'UserController', ['except' => 'show']);
    Route::post('/zone-backup/{id}', 'ZoneController@getBackup');
    Route::post('/zone/add-seats/{id}', 'ZoneController@addSeats');
    Route::post('/zone/generate-seats/{id}', 'ZoneController@generateSeats');
    Route::get('/event', 'EventController@index');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

/**
 * API ROUTES
 */
Route::get('/zone/data/{id}', 'ZoneController@getData');
Route::post('/add-hotel/{id}', 'HotelController@addHotel');
Route::get('/get-venue', 'ApplicationController@getVenue');