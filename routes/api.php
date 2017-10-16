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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//Route::group(['prefix'=>'api','middleware'=>'auth:api'], function(){
//
//    Route::resource('note','NoteController');
//
//});



Route::group(['middleware' => 'auth:api'], function () {

    Route::post('/logout', [
        'uses'=>'MobileAPI@logout'
    ]);

    Route::get('/scanUser', [
        'uses'=>'MobileAPI@scanUser'
    ]);

    Route::get('/blockUser', [
        'uses'=>'MobileAPI@blockUser'
    ]);

    Route::get('/myBlockedCards', [
        'uses'=>'MobileAPI@myBlockedCards'
    ]);

    Route::get('/me', [
        'uses'=>'MobileAPI@getAuthenticatedUser'
    ]);

});


Route::post('/login', [
    'uses'=>'MobileAPI@login'
]);