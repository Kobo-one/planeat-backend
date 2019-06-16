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
        Route::get('/logout', 'MemberController@logout')->name('member_logout');
    });

    Route::group([
        'prefix'=>'tutorial'
    ],function (){
        Route::get('/finished', 'tutorialController@finish')->name('tutorial_finish');
        Route::get('/{id}', 'tutorialController@index')->name('tutorial_index');

    });
});


Route::group([
    'prefix' => 'adult',
    'namespace' => 'Adult',
    'middleware' => ['auth','CheckMember:Adult','CheckTutorial']
], function() {
    Route::get('/', 'DashboardController@index')->name('adult_index');

    Route::get('/recipes', 'RecipesController@index')->name('recipes_index');
    Route::get('/recipes/{recipe}', 'RecipesController@show')->name('recipes_show');
    Route::get('/recipes/{recipe}/view', 'RecipesController@show')->name('recipes_view');

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
        Route::delete('/delete/', 'QuestController@delete')->name('quest_delete');
    });

    Route::group([
        'prefix'=>'groceries'
    ],function (){
        Route::get('/', 'GroceriesController@index')->name('groceries_index');
        Route::get('/{groceryList}', 'GroceriesController@show')->name('groceries_detail');
        Route::post('/', 'GroceriesController@create')->name('groceries_list_store');
        Route::post('/item', 'GroceriesController@addItem')->name('groceries_item_store');
        Route::post('/planning', 'GroceriesController@addPlanning')->name('groceries_planning_store');
        Route::get('/{groceryList}/done/{groceryItem}', 'GroceriesController@done')->name('groceries_item_done');
        Route::get('/{groceryList}/undone/{groceryItem}', 'GroceriesController@undone')->name('groceries_item_undone');
    });


    Route::group([
        'prefix'=>'planning'
    ],function (){
        Route::get('/', 'PlanningController@index')->name('planning_index');
        Route::get('/{date}', 'PlanningController@index')->name('planning_index_date');
        Route::get('/{date}/new', 'PlanningController@create')->name('planning_create');
        Route::get('/{date}/new/{recipe}', 'PlanningController@show')->name('planning_show');
        Route::post('/', 'PlanningController@store')->name('planning_store');
    });

    Route::group([
        'prefix'=>'family'
    ],function (){
        Route::get('/', 'FamilyMemberController@index')->name('family_index');
        Route::get('/{child}', 'FamilyMemberController@show')->name('family_detail');
        Route::get('/{child}/quests', 'FamilyMemberController@quests')->name('familyMember_quest');
        Route::get('/{child}/ratings', 'FamilyMemberController@ratings')->name('familyMember_rating');
        Route::get('/{child}/difficulties', 'FamilyMemberController@difficulties')->name('familyMember_difficultIngredients');
        Route::delete('/{child}/difficulties/remove/', 'FamilyMemberController@difficultyRemove')->name('familyMember_difficultIngredient_remove');
        Route::post('/{child}/difficulties/', 'FamilyMemberController@difficultyStore')->name('familyMember_difficultIngredient_store');
    });

    Route::group([
        'prefix'=>'settings'
    ],function (){
        Route::get('/', 'SettingsController@index')->name('settings_index');
        Route::get('/notifications', 'SettingsController@notification')->name('settings_notifications');
        Route::get('/family', 'SettingsController@family')->name('settings_family');
        Route::get('/profile', 'SettingsController@profile')->name('settings_profile');
        Route::get('/terms', 'SettingsController@terms')->name('settings_terms');
        Route::get('/privacy', 'SettingsController@privacy')->name('settings_privacy');
    });

});

Route::group([
    'prefix' => 'backend',
    'namespace' => 'Backend',
    'middleware' => ['auth','permission:edit recipes']
], function() {
    Route::get('/', 'DashboardController@index')->name('backend_index');
    Route::resource('recipes', 'RecipesController', [
        'as' => 'backend'
    ]);
    Route::resource('ingredients', 'IngredientController', [
        'as' => 'backend'
    ]);

});


Route::group([
    'prefix' => 'child',
    'namespace' => 'Child',
    'middleware' => ['auth','CheckMember:Child']
], function() {
    Route::get('/', 'DashboardController@index')->name('child_index');
    Route::get('/dinner', 'DinnerController@index')->name('child_dinner_index');
    Route::group([
        'prefix' => 'quests',
    ], function() {
        Route::get('/', 'QuestController@index')->name('child_quests_index');
        Route::get('/{memberquest}', 'QuestController@show')->name('child_quests_show');
        Route::post('/', 'QuestController@store')->name('child_quests_store');
    });
    Route::group([
        'prefix' => 'goals',
    ], function() {
        Route::get('/', 'GoalController@index')->name('child_goals_index');
        Route::get('/collect/{difficultIngredient}', 'GoalController@collect')->name('child_goals_collect');
    });
    Route::group([
        'prefix' => 'hero',
    ], function() {
        Route::get('/', 'HeroController@index')->name('child_hero_index');
        Route::get('/weapons', 'HeroController@weapons')->name('child_hero_weapons');
        Route::get('/shields', 'HeroController@shields')->name('child_hero_shields');
        Route::get('/equipment/{equipment}', 'HeroController@store')->name('child_equipment_store');
    });
});
