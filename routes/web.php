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
    return view('home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/qanda','qandaController@index');
Route::post('/askQuestion','askQuestionController@index');
Route::get('/answer/{question_id?}', 'answerController@index');
Route::post('/answerQuestion','askQuestionController@answerQuestion'); //i used this controller because of autoristion
Route::get('/blog','blogController@index');
Route::get('/blog_page','blogController@blog_page');
Route::post('/comment_on_blog_page','askQuestionController@comment_on_blog_page');
Route::post('/report_fault','askQuestionController@report_fault');
Route::post('/update_profilepic','askQuestionController@update_profilepic');
Route::get('/message','messageController@index');
Route::post('/sendMessage','askQuestionController@sendMessage');
Route::get('/under_dev',function(){
	return view('under_dev');
});