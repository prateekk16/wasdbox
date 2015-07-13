<?php


Route::group(['prefix' => 'profile', 'before' => array('auth')], function()
{


            Route::get('/', [
                'as' => '/',
                'uses' => 'UserController@index'
            ]);

             Route::post('/search_friend', [
                'as' => 'search_friend',
                'uses' => 'UserController@search_friend'
            ]);
             Route::post('/send_request', [
                'as' => 'send_request',
                'uses' => 'UserController@send_request'
            ]);


            







});