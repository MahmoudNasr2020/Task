<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('task.user.');
});

Route::group(['prefix'=>'users','namespace'=>'Task\User','as'=>'task.user.'],function (){
        // can replace all this route by using resource //

        Route::get('/','UserController@index');
        Route::get('/create','UserController@create')->name('create');
        Route::post('/add','UserController@store')->name('add');
        Route::get('/show/{id}/{name?}','UserController@show')->name('show');
        Route::get('/edit/{id}/{name?}','UserController@edit')->name('edit');
        Route::post('/update/{id}','UserController@update')->name('update');
        Route::delete('/delete/{id}','UserController@delete')->name('delete');
        Route::post('/multi_delete','UserController@multi_delete')->name('multi_delete');

});
