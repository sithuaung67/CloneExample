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



Route::get('/login',[
    'uses'=>'AuthController@getLogin',
    'as'=>'login'
]);

Route::post('/login',[
    'uses'=>'AuthController@postLogin',
    'as'=>'login'
]);


Route::group(['middleware'=>'auth'], function (){

    Route::get('/', function (){
        return redirect()->route('dashboard');
    });


    Route::group(['prefix'=>'user'], function (){

        Route::get('/account/setting',[
            'uses'=>'AdminController@getUserAccountSetting',
            'as'=>'account.setting'
        ]);
        Route::post('/password/update',[
            'uses'=>'AdminController@postUpdatePassword',
            'as'=>'password.update'
        ]);
        Route::get('/dashboard',[
            'uses'=>'AdminController@getDashboard',
            'as'=>'dashboard'
        ]);

        Route::get('/logout',[
            'uses'=>'AuthController@getLogout',
            'as'=>'logout'
        ]);
        Route::get('/error',[
            'uses'=>'AdminController@getError',
            'as'=>'error'
        ]);
    });




    Route::group(['prefix'=>'admin', ], function (){

        Route::get('/users',[
            'uses'=>'AdminController@getUsers',
            'as'=>'users'
        ]);
        Route::get('/user/new',[
            'uses'=>'AdminController@getNewUser',
            'as'=>'user.new'
        ]);
        Route::post('/user/new',[
            'uses'=>'AdminController@postNewUser',
            'as'=>'user.new'
        ]);
        Route::post('/user/delete',[
            'uses'=>'AdminController@postDeleteUser',
            'as'=>'user.delete'
        ]);

        Route::post('/user/update',[
            'uses'=>'AdminController@postUpdateUser',
            'as'=>'user.update'
        ]);

        Route::get('/Artist',[
            'uses'=>'AudioController@getArtist',
            'as'=>'getArtist'
        ]);
        Route::post('/Artist',[
            'uses'=>'AudioController@postArtist',
            'as'=>'postArtist'
        ]);
        Route::get('/Song',[
            'uses'=>'AudioController@getSong',
            'as'=>'getSong'
        ]);
        Route::post('/Song',[
            'uses'=>'AudioController@postSong',
            'as'=>'postSong'
        ]);
        Route::get('/Album',[
            'uses'=>'AudioController@getAlbum',
            'as'=>'getAlbum'
        ]);
        Route::post('/Album',[
            'uses'=>'AudioController@postAlbum',
            'as'=>'postAlbum'
        ]);
        Route::get('/Category',[
            'uses'=>'AudioController@getCategory',
            'as'=>'getCategory'
        ]);
        Route::post('/Category',[
            'uses'=>'AudioController@postCategory',
            'as'=>'postCategory'
        ]);
        Route::get('/NewMusic',[
            'uses'=>'AudioController@getNewMusic',
            'as'=>'getMusic'
        ]);
        Route::post('/NewMusic',[
            'uses'=>'AudioController@postNewMusic',
            'as'=>'postMusic'
        ]);
        Route::get('/Artist/edit/{id}',[
            'uses'=>'AudioController@getEditArtist',
            'as'=>'getEditArtist'
        ]);
        Route::post('/Artist/edit/',[
            'uses'=>'AudioController@postEditArtist',
            'as'=>'postEditArtist'
        ]);

        Route::get('/Artist/edit/{id}',[
            'uses'=>'AudioController@getEditArtist',
            'as'=>'getEditArtist'
        ]);
        Route::post('/Artist/edit/',[
            'uses'=>'AudioController@postEditArtist',
            'as'=>'postEditArtist'
        ]);
    });



});



