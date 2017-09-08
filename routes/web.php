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
    return Redirect::to('/login');
});

//Route::get('/home','welcome');


Route::group(['middleware' =>['web']],function (){
   Route::get('/login',['as'=>'login','uses'=>'AuthController@login']);
   Route::post('/handelLogin',['as'=>'handelLogin','uses'=>'AuthController@handelLogin']);
   Route::get('/home',['middleware'=>'auth','as'=>'home','uses'=>'UserController@home']);
    Route::get('/home/{id}/textData',['uses'=>'UserController@AddText']);

    Route::get('/home/{id}/handelAssignment',['uses'=>'AssignmentController@Assignment']);
    Route::get('/home/{id}/{id2}',['uses'=>'AssignmentController@show'])->where('id2','[0-9]+');
    Route::get('/home/{id}/{id2}/{filename}',['uses'=>'AssignmentController@install']);
    Route::get('/home/{id}/file/sd',['uses'=>'UserController@AddFile']);


  Route::get('/home/{id}/{filename}', ['uses' => 'UserController@getFile']);
    Route::get('/home/{id}',['uses'=>'UserController@course']);


    Route::get('/logout',function (){
        session()->flush();
        return redirect()->intended('/');

    });
    Route::get('/assignment',['uses'=>'AssignmentController@Assignment']);

    Route::get('/my',['uses'=>'StudentController@index']);
    Route::get('/my/{id}',['uses'=>'StudentController@showCourses']);
    Route::get('/my/{id}/{id2}',['uses'=>'StudentController@showAssignment']);
    Route::get('/my/{id}/{id2}/addFileToSubmission',['uses'=>'StudentController@addFileToSubmission']);
    Route::get('/my/{id}/{id2}/EditFileToSubmission',['uses'=>'StudentController@EditFileToSubmission']);
    Route::get('/my/{id}/{filename}', ['uses' => 'StudentController@get']);


});
