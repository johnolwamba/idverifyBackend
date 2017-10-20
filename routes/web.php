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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/logout',  [
        'as' => 'logout', 'uses' => 'HomeController@logout'
    ]);

    Route::get('/home',  [
        'as' => 'home', 'uses' => 'HomeController@index'
    ]);

    Route::get('/',  [
        'as' => 'home', 'uses' => 'HomeController@index'
    ]);

    //students
    Route::get('/students',  [
        'as' => 'students', 'uses' => 'StudentsController@index'
    ]);

    Route::get('/student/{id}',  [
        'as' => 'student', 'uses' => 'StudentsController@getStudent'
    ]);
    Route::post('/student/{id}/update', [
        'as' => 'student.update', 'uses' => 'StudentsController@updateStudent'
    ]);

    Route::post('/student/{id}/unblock',[
       'as' => 'student.unblock', 'uses' => 'StudentsController@unblockStudent'
    ]);


    Route::post('/student/{id}/delete', [
        'as' => 'student.delete', 'uses' => 'StudentsController@deleteStudent'
    ])->where('id', '[0-9]+');


    //staff
    Route::get('/staff',  [
        'as' => 'staff', 'uses' => 'StaffController@index'
    ]);

    Route::get('/staff/{id}',  [
        'as' => 'viewstaff', 'uses' => 'StaffController@getStaff'
    ]);
    Route::post('/staff/{id}/delete', [
        'as' => 'staff.delete', 'uses' => 'StaffController@deleteStaff'
    ])->where('id', '[0-9]+');

    Route::post('/staff/{id}/update', [
        'as' => 'staff.update', 'uses' => 'StaffController@updateStaff'
    ]);
    Route::post('/staff-create', [
        'as' => 'staff.create', 'uses' => 'StaffController@addStaffPost'
    ]);


    //blocked students
    Route::get('/blocked-students',  [
        'as' => 'blocked-students', 'uses' => 'BlockedStudentsController@index'
    ]);

    Route::get('/blocking/{id}',[
        'as' => 'blocking', 'uses' => 'BlockedStudentsController@getBlocking'
    ]);


    //gates
    Route::get('/gates',  [
        'as' => 'gates', 'uses' => 'GatesController@index'
    ]);

    Route::get('/gate/{id}',  [
        'as' => 'gate', 'uses' => 'GatesController@getGate'
    ]);

    Route::post('/gate-create', [
        'as' => 'gate.create', 'uses' => 'GatesController@addGatePost'
    ]);

    Route::post('/gate/{gate_id}/delete', [
        'as' => 'gate.delete', 'uses' => 'GatesController@deleteGate'
    ])->where('gate_id', '[0-9]+');

    Route::post('/gate/{id}/update', [
        'as' => 'gate.update', 'uses' => 'GatesController@updateGate'
    ]);


    //scans
    Route::get('/scans', [
        'as' => 'scans', 'uses' => 'ScansController@index'
    ]);




    //reports
    Route::get('/reports',  [
        'as' => 'reports', 'uses' => 'ReportsController@getReports'
    ]);

    /*
    Route::get('/add-article', [
        'as' => 'article.add', 'uses' => 'ArticleController@addArticle'
    ]);

    Route::post('/article-create', [
        'as' => 'article.create', 'uses' => 'ArticleController@addArticlePost'
    ]);

    Route::post('/article/{id}/update', [
        'as' => 'article.update', 'uses' => 'ArticleController@updateArticle'
    ]);

    Route::get('article/{id}',  [
        'as' => 'article', 'uses' => 'ArticleController@getArticle'
    ]);

    Route::post('article/{id}/delete', [
        'as' => 'article.delete', 'uses' => 'ArticleController@deleteArticle'
    ]);

    Route::post('article/{id}/publish', [
        'as' => 'article.publish', 'uses' => 'ArticleController@publishArticle'
    ]);

    Route::post('article/{id}/unpublish', [
        'as' => 'article.unpublish', 'uses' => 'ArticleController@unpublishArticle'
    ]);
    */


});