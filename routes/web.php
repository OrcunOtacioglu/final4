<?php

Route::get('/', 'ApplicationController@index');

Auth::routes();

//@TODO This should be implemented via API.
Route::get('/events', 'EventController@index');
Route::get('/e/{slug}', 'EventController@show');

// New API
Route::get('/event/{id}/seat-map', 'EventController@getSeatMap');

/**
 * WEB-UI ROUTES
 */
Route::get('/hotel', 'HotelController@all');
Route::get('/hotel/{name}', 'HotelController@show');
Route::resource('/order', 'OrderController');
Route::post('/remove-item/{id}', 'OrderController@removeItem');
Route::get('/complete-order/{reference}', 'OrderController@completeOrder');
Route::post('/order-complete', 'OrderController@validatePayment');
Route::get('/page/{slug}', 'PageController@show');
Route::get('/profile/{id}', 'UserController@show');
Route::put('/profile/{id}', 'UserController@profileUpdate');

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
    Route::resource('/sale', 'SaleController');
    Route::resource('/booking', 'BookingController');
    Route::resource('/event', 'EventController', ['except' => 'show']);
    Route::resource('/venue', 'VenueController');
    Route::resource('/seat-map','SeatMapController');
    Route::post('/confirmation-mail/{saleReference}', 'SaleController@sendConfirmationMail');
    Route::post('/zone-backup/{id}', 'ZoneController@getBackup');
    Route::post('/zone/add-seats/{id}', 'ZoneController@addSeats');
    Route::post('/zone/generate-seats/{id}', 'ZoneController@generateSeats');
    Route::post('/zone/refresh-zone/{id}', 'ZoneController@refreshZone');
    Route::get('/event', 'EventController@index');
    Route::get('/box-office', 'BoxOfficeController@index');
    Route::post('/booking/{reference}/add-hotel', 'BookingController@addHotel');
    Route::post('/booking/{reference}/convert', 'BookingController@convertBooking');
    Route::get('/analytics', 'AnalyticsController@index');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

/**
 * API ROUTES
 */
Route::get('/zone/data/{id}', 'ZoneController@getData');
Route::post('/add-hotel/{id}', 'HotelController@addHotel');
Route::get('/get-venue', 'ApplicationController@getVenue');