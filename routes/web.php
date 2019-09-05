<?php

Auth::routes();

Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'landing'])->name('landing');
Route::get('/slack', [\App\Http\Controllers\RedirectController::class, 'slack'])->name('slack-redirect');
Route::get('/meetup', [\App\Http\Controllers\RedirectController::class, 'meetup'])->name('meetup-redirect');
Route::get('/future-topics', [\App\Http\Controllers\FutureTopicsController::class, 'index'])->name('future-topics.index');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {
    return view('nothere');
});
