<?php

/**
 * Laravel Shop
 */
Route::group(['prefix' => 'laravel-shop', 'middleware' => ['web', 'shop'], 'as' => 'shop::'], function () {
    Route::get('/', ['as' => 'index', 'uses' => '\stdsync\LaravelShop\Controllers\IndexController@index']);
    Route::get('/list', ['as' => 'list', 'uses' => '\stdsync\LaravelShop\Controllers\ListController@index']);
    Route::get('/product/{id}', ['as' => 'product', 'uses' => '\stdsync\LaravelShop\Controllers\ProductController@index']);
    Route::group(['prefix' => 'cart', 'as' => 'cart::'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\stdsync\LaravelShop\Controllers\CartController@index']);
        Route::post('/add', ['uses' => '\stdsync\LaravelShop\Controllers\CartController@add']);
        Route::post('/remove', ['uses' => '\stdsync\LaravelShop\Controllers\CartController@remove']);
        Route::post('/update', ['uses' => '\stdsync\LaravelShop\Controllers\CartController@update']);
    });
    Route::group(['prefix' => 'checkout', 'as' => 'checkout::'], function () {
        Route::group(['prefix' => 'onepage', 'as' => 'onepage::'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\stdsync\LaravelShop\Controllers\CheckoutOnepageController@index']);
            Route::post('/order', ['uses' => '\stdsync\LaravelShop\Controllers\CheckoutOnepageController@checkoutOrder']);
            Route::post('/iagree', ['uses' => '\stdsync\LaravelShop\Controllers\CheckoutOnepageController@checkoutIAgree']);
            Route::post('/form', ['uses' => '\stdsync\LaravelShop\Controllers\CheckoutOnepageController@checkoutForm']);
            Route::post('/payment-method', ['uses' => '\stdsync\LaravelShop\Controllers\CheckoutOnepageController@checkoutPaymentMethod']);
        });
        Route::group(['prefix' => 'payment', 'as' => 'payment::'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\stdsync\LaravelShop\Controllers\CheckoutPaymentController@index']);
            Route::get('/payed', ['as' => 'payed', 'uses' => '\stdsync\LaravelShop\Controllers\CheckoutPaymentController@payed']);
        });
        Route::group(['prefix' => 'confirmation', 'as' => 'confirmation::'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\stdsync\LaravelShop\Controllers\CheckoutConfirmationController@index']);
        });

    });
    Route::group(['prefix' => 'admin', 'as' => 'admin::'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\stdsync\LaravelShop\Controllers\AdminController@index']);
        Route::get('/order/{id}', ['as' => 'order', 'uses' => '\stdsync\LaravelShop\Controllers\AdminController@order']);
    });
});