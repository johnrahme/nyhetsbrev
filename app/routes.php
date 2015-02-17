<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//startsida
Route::get('/', array('as'=>'start', 'uses'=>'HomeController@index'));


//Mail
Route::get('mail', array('as'=>'mail','uses' => 'MailController@index'))->before('auth');

Route::get('viewmail', array('as'=>'viewmail','uses' => 'MailController@view'))->before('auth');

Route::post('viewdynmail', array('as'=>'viewdynmail','uses' => 'MailController@viewdyn'))->before('auth');

Route::post('senddynmail', array('as'=>'senddynmail','uses' => 'MailController@senddyn'))->before('auth');

Route::get('createdynmail', array('as'=>'createdynmail','uses' => 'MailController@create'))->before('auth');

//Actually dynamic mail

Route::put('emails/{id}/addcolumn',array('as' => 'emails.column.create', 'uses' =>'EmailController@addColumn'))->before('auth');

Route::delete('emails/column/destroy', array('as'=>'emails.column.destroy', 'uses'=>'EmailController@destroyColumn'))->before('auth');

Route::get('emails/column/{id}/edit', array('as'=>'emails.column.edit', 'uses'=>'EmailController@editColumn'))->before('auth');

Route::put('emails/column/update',array('as' => 'emails.column.update', 'uses' =>'EmailController@updateColumn'))->before('auth');

Route::get('emails/{id}/preview', array('as'=>'emails.preview', 'uses' => 'EmailController@emailPreview'))->before('auth');

Route::get('emails/{id}/send', array('as'=>'emails.send', 'uses' => 'EmailController@emailSend'))->before('auth');

Route::group(array('before' => 'auth'), function() {
    Route::resource('emails', 'EmailController'); //['only' => ['store', 'index', 'create', 'destroy']
});

//Registration

Route::put('signup', array('as'=>'signup', 'uses' =>'RegistrationController@register'));

//Nedladdning

Route::get('download', array('as'=>'download', 'uses' =>'DownloadController@index'))->before('auth');
Route::put('download/get', array('as'=>'download.get', 'uses' =>'DownloadController@get'))->before('auth');

//Login

Route::get('login', array('as' =>'login', 'uses' => 'SessionsController@create'));

Route::get('logout', array('as' => 'logout', 'uses' => 'SessionsController@destroy'))->before('auth');

Route::resource('sessions', 'SessionsController', ['only' => ['store', 'index', 'create', 'destroy']]);

//Users


Route::get('user', array('as' => 'user', 'uses' => 'UserController@index'))->before('auth');

Route::get('user/new', array('as' => 'new_user', 'uses' => 'UserController@newUser'))->before('auth');

Route::post('user/create', array('uses' => 'UserController@createUser'))->before('auth');






