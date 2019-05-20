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
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home')->middleware('CheckMember');

Route::group(['prefix'=>'family','namespace'=>'Family','middleware'=>'auth'], function(){

    Route::group(['prefix'=>'member'], function(){
        Route::get('/login','MemberController@index')->name('member_index');
        Route::get('/','MemberController@showLoginForm')->name('member_detail');
        Route::get('/create','MemberController@create')->name('member_create');
        Route::post('/create','MemberController@showCreateForm')->name('member_store');
        Route::post('/login','MemberController@login')->name('member_login');
    });
});


Route::group([
    'prefix' => 'adult',
    'namespace' => 'Adult',
    'middleware' => ['auth','CheckMember:Adult']
], function() {
    Route::get('/', 'DashboardController@index')->name('adult_index');
});


Route::group([
    'prefix' => 'child',
    'namespace' => 'Child',
    'middleware' => ['auth','CheckMember:Child']
], function() {
    Route::get('/', 'DashboardController@index')->name('child_index');
});
