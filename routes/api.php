<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});

Route::get('/audio',[
    'uses'=>'ApiController@getAudio'
]);
Route::get('/song',[
    'uses'=>'ApiController@getSong'
]);
Route::get('/artist',[
    'uses'=>'ApiController@getArtist'
]);
Route::get('/album',[
    'uses'=>'ApiController@getAlbum'
]);
Route::get('/category',[
    'uses'=>'ApiController@getCategory'
]);
Route::get('/search/{q}',[
    'uses'=>'ApiController@getSearch'
]);