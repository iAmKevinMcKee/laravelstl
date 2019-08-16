<?php

Auth::routes();

Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'show']);

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
