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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add', function() {
    return \App\User::find(3)->add_friend(1);
});

Route::get('/accept', function() {
    return \App\User::find(1)->accept_friend(4);
});

Route::get('/friends', function() {
    return \App\User::find(1)->friends();
});

Route::get('/pending_friends', function() {
    return \App\User::find(3)->pending_friend_requests();
});

Route::get('/ids', function() {
    return \App\User::find(1)->friends_ids();
});

Route::get('/is', function() {
    return \App\User::find(1)->is_friends_with(5);
});





Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{slug}', [
        'uses' => 'ProfilesController@index',
        'as' => 'profile'
    ]);
    Route::get('/profile/edit/profile', [
        'uses' => 'ProfilesController@edit',
        'as' => 'profile.edit'
    ]);
    Route::post('/profile/update/profile', [
        'uses' => 'ProfilesController@update',
        'as' => 'profile.update'
    ]);

    Route::get('/check_relationship_status/{id}', [
        'uses' => 'FriendshipsController@check',
        'as' => 'check'
    ]);
});