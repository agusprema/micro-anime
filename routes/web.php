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

Route::get('/', 'Home\HomeController@index')->name('welcome');
Route::get('/ongoing', 'Home\HomeController@ongoing');
Route::get('/tamat', 'Home\HomeController@tamat');
Route::get('/list-anime', 'Home\HomeController@list_anime');
Route::get('/archive/genre', 'Home\HomeController@genres');
Route::get('/jadwal', 'Home\HomeController@jadwal');

Route::get('/test', 'TestController@index')->middleware(['auth', 'verified', 'auth.moderator']);
/* Route::get('/test', 'TestController@index'); */

Route::get('/archive/genre/{genre}', 'Home\HomeController@genre');
Route::get('/anime/{anime}', 'Home\HomeController@anime');

Auth::routes(['verify' => true]);

Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

Route::namespace('User')->prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/edit-profile', 'EditProfileController@index');
    Route::post('/edit-profile', 'EditProfileController@update');
    Route::get('/bookmark-anime', 'BookmarkController@index');
});

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'verified', 'auth.admin'])->name('admin.')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');

    Route::resource('/anime', 'AnimeController', ['except' => ['create', 'show']]);
    Route::resource('/slider-anime', 'SliderController', ['except' => ['create', 'show']]);
    Route::resource('/detail-anime', 'DetailAnimeController', ['except' => ['create']]);
    Route::resource('/episode-anime', 'EpisodeController', ['except' => ['create', 'index']]);
});

Route::namespace('Moderator')->prefix('moderator')->middleware(['auth', 'verified', 'auth.moderator'])->name('moderator.')->group(function () {
    Route::get('/', 'ModeratorController@index')->name('moderator');

    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/menu', 'MenuController', ['except' => ['create', 'show']]);
    Route::resource('/role', 'RoleController', ['except' => ['create', 'show']]);
    Route::resource('/submenu', 'SubMenuController', ['except' => ['create', 'show']]);
    Route::resource('/group-menu', 'GroupMenuController', ['except' => ['create', 'show']]);
    Route::resource('/users', 'UsersController', ['except' => ['create', 'show']]);
    Route::resource('/ads-banner', 'AdsBannerController', ['except' => ['create', 'show']]);
    Route::resource('/ads-video', 'AdsVideoController', ['except' => ['create', 'show']]);
    Route::resource('/general-settings', 'GeneralSettingsController', ['except' => ['create', 'show']]);

    Route::get('/roleaccess/{id}', 'RoleAccesscontroller@index');
    Route::post('/changeaccess', 'RoleAccesscontroller@store');
});

Route::namespace('Api')->prefix('api')->name('api.')->group(function () {
    Route::get('/check_login', 'ApiController@check_login');
    Route::get('/add-list/{id}', 'ApiController@add_list');
    Route::get('/remove-list/{id}', 'ApiController@remove_list');
    Route::get('/hot-views/{id}/{eps}', 'ApiController@hot_views');
    Route::get('/history-user/{eps}', 'ApiController@history_anime');
    Route::get('/visitor', 'ApiController@visitor_counter')->middleware(['auth', 'verified', 'auth.moderator']);
    /* Route::get('/ads-video', 'ApiController@video_ads'); */
});

Route::get('/{episode}', 'Home\HomeController@play_anime');
