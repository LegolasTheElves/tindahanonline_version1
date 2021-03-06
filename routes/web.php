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
//index route
Route::get('/', [
    'uses'=>'ProductController@getIndex',
    'as' => 'product.index'
]);
//route for add to cart
Route::get('/add-to-cart/{id}',[
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.AddToCart'
]);
// route reduce by one
Route::get('/reduce/{id}',[
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);
//route to remove all item
Route::get('/remove/{id}',[
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);

//shopping cart page
Route::get('/shopping-cart',[
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);
//checkout route
Route::get('/checkout',[
   'uses' =>'ProductController@getCheckout',
   'as' =>'checkout',
   'middleware' => 'auth'
]);
Route::post('/checkout',[
   'uses' =>'ProductController@postCheckout',
   'as' =>'checkout',
   'middleware' => 'auth'
]);
//group route for user management
Route::group(['prefix'=>'user'], function(){
    Route::group(['middleware'=>'guest'], function(){
          //sign up routes
        Route::get('/signup',[
           'uses' =>'UserController@getSignup',
            'as' => 'user.signup'
        ]);
        Route::post('/signup', [
           'uses' => 'UserController@postSignup',
            'as' =>'user.signup'
        ]);
        //sign in routes
        Route::get('/signin',[
           'uses' =>'UserController@getSignin',
            'as' => 'user.signin'
        ]);
        Route::post('/signin', [
           'uses' => 'UserController@postSignin',
            'as' =>'user.signin'
        ]);
    });
Route::group(['middleware'=>'auth'], function(){
        Route::get('/profile', [
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile'
    ]);
        Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
    ]);
 });
}); 
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//route for search
Route::get('/search', [
    'uses'=>'ProductController@getSearch',
    'as' => 'search'
]);
//admin route
Route::group(['prefix'=>'admin'], function(){
    Route::group(['middleware'=>'guest'], function(){
        Route::get('/myproducts', [
            'uses'=>'ProductController@adminIndex',
            'as' => 'myproducts'
        ]);
        //delete single item
        Route::get('/deleteOne/{id}', [
            'uses'=>'ProductController@destroy',
            'as' => 'deleteOne'
        ]);
    });
});
