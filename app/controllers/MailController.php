<?php

class MailController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function index()
    {

        Mail::send('mail.layouts.sidebar', array('test' => 'test'), function ($message) {
            $message->from('john_rahme92@hotmail.com', 'John Rahme');

            $message->to('john.rahme.se@gmail.com')->subject('Nyhetsbrev');

        });

        return View::make('mail.layouts.sidebar')
            ->with('title', 'Mail');
    }
}
