<?php

Auth::routes();

Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'landing'])->name('landing');
Route::get('/slack', [\App\Http\Controllers\RedirectController::class, 'slack'])->name('slack-redirect');
Route::get('/youtube', [\App\Http\Controllers\RedirectController::class, 'youtube'])->name('youtube-redirect');
Route::get('/meetup', [\App\Http\Controllers\RedirectController::class, 'meetup'])->name('meetup-redirect');
Route::get('/events', [\App\Http\Controllers\EventsController::class, 'index'])->name('events.index');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'AdminController@index')->middleware('admin')->name('admin.index');
    Route::get('/admin/users', 'AdminUsersController@index');
    Route::get('/admin/events', 'AdminEventsController@index');
});

Route::get('/test', function () {
    return view('nothere');
});
