<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace'=>'Task\Api\\'],function(){

    // User Route 
    Route::group(['prefix'=>'users'],function(){
        Route::post('register','User\AuthController@register');
        Route::post('login','User\AuthController@login');
    });
    //verify email
    Route::get('email/verify/{id}','User\VerificationController@verify')->name('verification.verify');

    //not auth
    Route::get('unauthenticated','User\AuthController@unauthenticated')->name('unauthenticated');


    // auth route
    Route::group(['middleware'=>'auth:api'],function(){
        Route::post('users/logout','User\AuthController@logout');
        Route::get('email/resend','User\VerificationController@resend')->name('verification.resend');

        //edit info
        Route::post('users/update/{id}','User\UserController@update');

    });
});


