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
Route::get('mail', array('as'=>'mail','uses' => 'MailController@index'));

Route::get('viewmail', array('as'=>'viewmail','uses' => 'MailController@view'));

Route::post('viewdynmail', array('as'=>'viewdynmail','uses' => 'MailController@viewdyn'));

Route::post('senddynmail', array('as'=>'senddynmail','uses' => 'MailController@senddyn'));

Route::get('createdynmail', array('as'=>'createdynmail','uses' => 'MailController@create'));

//Actually dynamic mail

Route::put('emails/{id}/addcolumn',array('as' => 'emails.column.create', 'uses' =>'EmailController@addColumn'));

Route::delete('emails/column/destroy', array('as'=>'emails.column.destroy', 'uses'=>'EmailController@destroyColumn'));

Route::get('emails/column/{id}/edit', array('as'=>'emails.column.edit', 'uses'=>'EmailController@editColumn'));

Route::put('emails/column/update',array('as' => 'emails.column.update', 'uses' =>'EmailController@updateColumn'));

Route::get('emails/{id}/preview', array('as'=>'emails.preview', 'uses' => 'EmailController@emailPreview'));

Route::resource('emails', 'EmailController'); //['only' => ['store', 'index', 'create', 'destroy']

//Registration

Route::put('signup', array('as'=>'signup', 'uses' =>'RegistrationController@register'));





