<?php

Route::get('/', function() {
    return redirect()->route('welcome');
});

Route::group(['prefix' => App\Http\Middleware\Locale::getLocale()], function() {

    Route::get('/', 'StaticController@welcome')->name('welcome');
    Route::get('/projects', 'NewsController@index')->name('news');
    Route::get('/about-us', 'StaticController@about')->name('about');
    Route::get('/privacy', 'StaticController@privacy')->name('privacy');
    Route::get('/careers', 'StaticController@careers')->name('careers');

    Route::get('/ca/{gender?}/{filter?}', 'ShopController@catalog')->name('cat');
    Route::get('/item/{item}', 'ShopController@item')->name('item');

    /* ADMIN CONTROLLER */
    Auth::routes();

    Route::group(['prefix' => '/admin'], function() {

        Route::get('/', 'AdminController@index')->name('admin');

        /* ITEM CONTROLLER */
        Route::group(['prefix' => '/item'], function() {

            Route::get('/create', 'AdminController@create_item')->name('create_item');
            Route::post('/save', 'AdminController@save_item')->name('save_item');
            Route::get('/edit/{item}', 'AdminController@edit_item')->name('edit_item');
            Route::post('/update/{item}', 'AdminController@update_item')->name('update_item');
            Route::delete('/delete/{item}', 'AdminController@delete_item')->name('delete_item');

        });

        /* NEWS CONTROLLER */
        Route::group(['prefix' => '/news'], function() {

            Route::get('/create', 'NewsController@create_item')->name('create_news');
            Route::post('/save', 'NewsController@save_item')->name('save_news');
            Route::get('/edit/{news}', 'NewsController@edit_item')->name('edit_news');
            Route::post('/update/{news}', 'NewsController@update_item')->name('update_news');
            Route::delete('/delete/{news}', 'NewsController@delete_item')->name('delete_news');

        });
    });
});
