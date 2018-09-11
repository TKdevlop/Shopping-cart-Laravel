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

Route::get('/',[
    'uses'=> 'ProductController@getIndex',
    'as' => 'Product/index'
]);
Route::get('/add-to-cart/{id}',[
    'uses'=>'ProductController@getAddToCart',
    'as' => 'product/add-to-cart'
]);

Route::group(['middleware'=>'auth'],function(){
    Route::get('/checkout',[
        'uses'=>'ProductController@getCheckout',
         'as'=> 'checkout'
        ]);
    Route::post('/checkout',[
            'uses'=>'ProductController@postCheckout',
             'as'=> 'checkout'
            ]);


   });

    
Route::group(['prefix'=>'cart'],function(){
    Route::get('/',[
        'uses'=>'ProductController@getCart',
        'as' => 'product/cart'
    ]);
    Route::get('/addItem/{id}',[
        'uses'=>'ProductController@increaseQty',
        'as' => 'product/cart/increaseQty'
    ]);
    Route::get('/subItem/{id}',[
        'uses'=>'ProductController@decreaseQty',
        'as' => 'product/cart/decreaseQty'
    ]);
    Route::get('/deleteItem/{id}',[
        'uses'=>'ProductController@deleteQty',
        'as' => 'product/cart/deleteQty'
    ]);
});


Route::group(['prefix'=>'user'],function(){
    Route::group(['middleware'=>'guest'],function(){
        Route::get('/signup',[
            'uses'=> 'UserController@getSignUp',
            'as' => 'users/signup'
        ]);
        Route::post('/signup',[
            'uses'=> 'UserController@postSignUp',
            'as' => 'users/signup'
        ]);
        Route::get('/signin',[
            'uses'=> 'UserController@getSignIn',
            'as' => 'users/signin'
        ]);
        Route::post('/signin',[
            'uses'=> 'UserController@postSignIn',
            'as' => 'users/signin'
        ]);
    });
    Route::group(['middleware'=>'auth'],function(){
        Route::get('/profile',[
            'uses'=> 'UserController@userProfile',
            'as' => 'users/profile'
        ]);
        Route::get('/logout',[
            'uses'=> 'UserController@userLogout',
            'as' => 'users/logout'
        ]);
    });
});
