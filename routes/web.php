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

// Authentication Routes...
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

//authentication for waiter
$this->post('/loginWaiter', 'Auth\LoginController@loginWaiter');
//registration for waiter
$this->post('/createWaiter', 'Auth\RegisterController@createWaiter');

//getcategory
Route::get('/getCategory'                 ,        'CategoryController@getCategory');
Route::post('/getFoodList'                 ,        'CategoryFoodList@getFoodList');


Route::get('/switch-ajax-transaction'                 ,        'KitchenController@loadajaxPage');

Route::group(['prefix' => 'kitchen','middleware' => 'isKitchen'], function(){
    Route::get('/kitchen'                             ,         'KitchenController@kitchenPage');

    Route::get('/ingredients'                         ,         'AdministratorController@ingredientPage');
    Route::get('/switch-ajax-ingredient'              ,         'AdministratorController@loadIngredient');

    Route::get('/menus'                               ,        'AdministratorController@menuPage');
    Route::get('/switch-ajax-menu'                    ,        'AdministratorController@loadMenu');

});

Route::group(['prefix' => 'admin','middleware' => 'isAdmin'], function(){

    Route::get('/graphs'                            ,         'AdministratorController@graphPage');

    Route::get('/ingredients'                       ,        'AdministratorController@ingredientPage');
    Route::get('/switch-ajax-ingredient'            ,        'AdministratorController@loadIngredient');
    Route::post('/add-ingredient'                   ,        'AdministratorController@addIngredient');

    Route::get('/clients'                           ,        'AdministratorController@clientPage');
    Route::get('/switch-ajax-user'                  ,        'AdministratorController@loadUser');

    Route::get('/menus'                             ,        'AdministratorController@menuPage');
    Route::get('/menu/{id}'                         ,        'AdministratorController@viewMenu');
    Route::get('/switch-ajax-menu'                  ,        'AdministratorController@loadMenu');
    Route::post('/add-menu'                         ,        'AdministratorController@addMenu');
    Route::post('/update-menu'                      ,        'AdministratorController@updateMenu');


    Route::post('/loadGraph'                        ,        'AdministratorController@loadGraph');

});

Route::group(['prefix' => 'cashier','middleware' => 'isCashier'], function(){
    Route::get('/cashier'                             ,         'CashierController@cashierPage');
    Route::get('/transaction/{id}'                    ,         'CashierController@transactionPage');
});


