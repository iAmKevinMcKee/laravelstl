<?php

Auth::routes();

Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'comingSoon'])->name('landing');
Route::get('/slack', [\App\Http\Controllers\RedirectController::class, 'slack'])->name('slack-redirect');
Route::get('/meetup', [\App\Http\Controllers\RedirectController::class, 'meetup'])->name('meetup-redirect');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
