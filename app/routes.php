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

//Users

Route::get('users', array('as'=>'users', 'uses'=>'UserController@index'));

Route::get('users/new', array('as'=> 'new_user', 'uses'=> 'UserController@newuser'));

Route::get('users/{id}', array('as'=> 'user', 'uses'=> 'UserController@view'));

Route::post('users/create', array('uses' =>'UserController@createUser'));

Route::get('users/{id}/edit', array('as'=>'edit_user', 'uses'=>'UserController@edit'));


Route::put('users/update', array('uses'=>'UserController@update'));

Route::delete('users/delete', array('uses'=>'UserController@destroy'));

//events

Route::get('events', array('as'=>'events', 'uses'=>'EventController@index'));

Route::get('events/new', array('as'=> 'new_event', 'uses'=> 'EventController@newevent'));

Route::get('event/{id}', array('as'=> 'event', 'uses'=> 'EventController@view'));

Route::post('events/create', array('uses' =>'EventController@createEvent'));

Route::get('events/{id}/edit', array('as'=>'edit_event', 'uses'=>'EventController@edit'));


Route::put('events/update', array('uses'=>'EventController@update'));

Route::delete('events/delete', array('uses'=>'EventController@destroy'));

//registrations
Route::get('event/{id}/registrations', array('as'=>'registrations', 'uses'=>'RegistrationController@index'));

Route::get('event/{id}/registrations/new', array('as'=>'new_registration', 'uses'=>'RegistrationController@newRegistration'));

Route::post('events/registrations/create', array('uses' =>'RegistrationController@createRegistration'));

Route::delete('registrations/delete', array('uses'=>'RegistrationController@destroy'));

//contactPage

Route::get('contact', array('as' => 'contact', 'uses' => 'ContactController@index'));

Route::post('contact/send', array('as' => 'send', 'uses' => 'ContactController@send'));

Route::get('contact/sent', array('as' => 'sent', 'uses' => 'ContactController@sent'));


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







