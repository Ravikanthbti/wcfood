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


Route::get('/', 'FrontendController@index');
Route::get('/about-us', 'FrontendController@aboutUs');
Route::get('/gallery', 'FrontendController@ourGallery');
Route::get('/blog', 'FrontendController@ourBlog');
Route::get('/services', 'FrontendController@ourServices');
Route::get('/contact-us', 'FrontendController@contactUs');
Route::post('/storecontus', 'FrontendController@storeContUs');
Route::get('/menu-list', 'FrontendController@menuList'); 
Route::post('/subscribestore', 'FrontendController@subscribeStore');
Route::get('/thankyou', 'FrontendController@thankyou');



                                                                        
Route::get('/sms', 'FrontendController@smsSubscribe');
// Route::post('/smspost', 'FrontendController@sendSmsPost');
// Route::get('/getform', 'FrontendController@demoform');

Route::get('filter_data','SearchDataController@getFilterItem');

                                                                        
Auth::routes();

Route::post('/logout-user','Auth\LoginController@logoutUser');
                                                               


Route::get('/my-account', 'HomeController@index');

Route::post('add/delivery-address', 'HomeController@addDeliveryAddress');

Route::post('update/delivery-address', 'HomeController@updateDeliveryAddress');

//social login for user
Route::get('/login/{social}', 'SocialController@redirect')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback', 'SocialController@callback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');


//*****************************  Admin   ***********************************************


 Route::get('admin-dashboard',['as'=>'admin-dashboard','uses'=>'Admin\ADashboardController@index']);
 Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
 Route::post('admin','Admin\LoginController@login')->name('admin.login.post');
 Route::get('admin/register','Admin\RegisterController@registerForm')->name('admin.register');
 Route::post('admin/register','Admin\RegisterController@create');
 Route::get('admin/logout', 'Admin\LoginController@logout');
 Route::post('admin-password/email','ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
 Route::get('admin-password/reset','ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

//Reset Password

Route::get('admin-password/reset{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');

Route::group(['prefix' => 'admin'], function () {
    Route::get('restaurants','RestaurantController@index');
    Route::get('create-restaurant','RestaurantController@create');
    Route::post('store-restaurant','RestaurantController@store');
    Route::get('edit-restaurant/{id}','RestaurantController@edit');
    Route::post('update-restaurant/{id}','RestaurantController@update');
    Route::get('delete-restaurant/{id}','RestaurantController@destroyRestaurant');
    
    Route::get('restaurant-category','RestaurantController@getRestaurantCategory');
    Route::get('add-restaurant-category','RestaurantController@addRestaurantCategory');
    Route::post('add-restaurant-category','RestaurantController@storeRestaurantCategory');
    
    Route::get('restaurant-menus','RestaurantController@getMenu');
    Route::get('add-restaurant-menu/{id}','RestaurantController@regMenu');
    Route::post('restaurant-store-menus','RestaurantController@storeMenu');
    Route::get('restaurant-edit-menu/{id}','RestaurantController@editMenu');
    Route::post('restaurant-update-menu/{id}','RestaurantController@updateMenu');
    Route::get('restaurant-delete-menu/{id}','RestaurantController@destroyMenu');
    Route::get('restaurant-view-menu/{id}','RestaurantController@viewMenu');
    
    Route::get('menu-items/{id}','RestaurantController@getMenuItem');
  //  Route::get('menu-items/{id}','RestaurantController@getMenuItem');
    Route::get('add-menu-items/{id}','RestaurantController@addMenuItem');
    Route::post('add-menu-items/','RestaurantController@storeMenuItem');
    Route::get('edit-menu-items/{id}','RestaurantController@editMenuItem');
    Route::get('delete-menu-items/{id}','RestaurantController@destroyMenuItem');
    });



    ///// Searching  Restaurant Route /////////
    Route::get('search-restaurant','SearchDataController@create');
    Route::post('search-restaurant','SearchDataController@searchRestaurants');
    // Route::get('restaurants','SearchDataController@restaurantList');
    Route::get('get-restaurant','SearchDataController@getRestaurant');
    Route::get('view-restaurant/{slug}','SearchDataController@viewRestaurant');
    Route::get('restaurant-menu/{id}','SearchDataController@getRestaurentMenu');
    
    //search & filter item //
    //Route::get('/search','SearchDataController@seachItem');
    Route::get('get_filter','SearchDataController@indexproduct');
    Route::get('/indexproduct','SearchDataController@indexproductview');

    ///// Cart Area /////////
    Route::post('addTocart','CartController@addToCart');
    Route::get('cart',['as'=>'cart','uses'=>'CartController@viewCart']);
    Route::get('/viewcart','CartController@index');
    Route::get('/cart/deleteItem/{id}','CartController@deleteItem');
    Route::post('/cart/update-quantity/','CartController@updateQuantity');
    Route::get('reorder',['as'=>'reorder','uses'=>'CartController@reOrder']);
    Route::get('myprofile',['as'=>'myprofile','uses'=>'CartController@myProfile']);                                                                        

    //Route::get('cancelorder',['as'=>'cancelorder','uses'=>'PaymentController@cancelOrder']);
    /////Checkout/////
    Route::get('checkout-init',['as'=>'checkout-init','uses'=>'CartController@checkout']);
                                                                           
    Route::post('delivery-address','CartController@deliveryAddress');
   
    Route::get('/clearcart','CartController@clearCart');

    /* ================================ Checkout Section ================================= */

    Route::post('payment-init','CheckoutController@init');
    Route::get('checkout/order/success','CheckoutController@OrderSuccess');                                                                  
    Route::get('payment', ['as' => 'payment', 'uses' => 'PaymentController@payment']);
    Route::get('payment/status', ['as' => 'payment.status', 'uses' => 'PaymentController@status']);
    Route::get('/paymentcancel','PaymentController@paymentCancel');

    // //Ajax controller//
    // Route::get('/live_search', 'SearchDataController@liveSearch');
    // Route::get('/live_search/action', 'SearchDataController@ajaxseachItem')->name('live_search.action');

    //Ajax Serching
    Route::get('/search', 'SearchDataController@restoMenuSearch')->name('search');
    Route::get('/autocomplete', 'SearchDataController@autocomplete')->name('autocomplete');