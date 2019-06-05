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

Route::get('/', 'HomeController@index')->name('home')->middleware('guest');

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
    Route::get('/recipes', 'RecipesController@index')->name('recipes_index');
    Route::get('/groceries', 'GroceriesController@index')->name('groceries_index');
    Route::group([
        'prefix'=>'quests'
    ],function (){
        Route::get('/', 'QuestController@index')->name('quests_index');
        Route::get('/detail', 'QuestController@show')->name('quest_detail');
        Route::get('/rate/{date}', 'QuestController@rating')->name('quest_rating');
        Route::post('/rate/{date}', 'QuestController@ratingStore')->name('quest_rating_store');
        Route::get('/create/{date}', 'QuestController@create')->name('quest_create');
        Route::get('/create/{date}/{ingredient}', 'QuestController@create')->name('quest_create_with_ingredient');
        Route::post('/create/{date}/{ingredient}', 'QuestController@store')->name('quest_store');
        Route::get('/delete/{id}', 'QuestController@delete')->name('quest_delete');
    });

});

Route::group([
    'prefix' => 'backend',
    'namespace' => 'Backend',
    'middleware' => ['auth','permission:edit recipes']
], function() {
    Route::get('/', 'DashboardController@index')->name('backend_index');
    Route::get('/recipes', 'RecipesController@index')->name('backend_recipes_index');
    Route::resource('recipes', 'RecipesController', [
        'as' => 'backend'
    ]);

});


Route::group([
    'prefix' => 'child',
    'namespace' => 'Child',
    'middleware' => ['auth','CheckMember:Child']
], function() {
    Route::get('/', 'DashboardController@index')->name('child_index');
});
