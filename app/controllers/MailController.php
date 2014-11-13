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

        Mail::send('mail.layouts.antowrk', array('test' => 'test'), function ($message) {
            $message->from('john.rahme.test@gmail.com', 'John Rahme');

            $message->to(array('john.rahme.se@gmail.com'))->subject('Nyhetsbrev Test');

        });

        return View::make('mail.layouts.antowrk')
            ->with('title', 'Mail');
    }
    public function view()
    {


        return View::make('mail.layouts.antowrk')
            ->with('title', 'Mail');
    }
    public function viewdyn(){

        return View::make('mail.layouts.antworkDyn')
            ->with('header', Input::get('header'))
            ->with('bigColumn', Input::get('bigColumn'))
            ->with('leftColumn1', Input::get('leftColumn1'))
            ->with('leftColumn2', Input::get('leftColumn2'))
            ->with('rightColumn1', Input::get('rightColumn1'))
            ->with('rightColumn2', Input::get('rightColumn2'));

    }
    public function create(){
        return View::make('mail.test2')
            ->with('title', 'Mail');
    }

    public function senddyn()
    {
        $data = array('header'=>Input::get('header'),
            'bigColumn' => Input::get('bigColumn'),
            'leftColumn1' => Input::get('leftColumn1'),
            'leftColumn2' => Input::get('leftColumn2'),
            'rightColumn1' => Input::get('rightColumn1'),
            'rightColumn2' => Input::get('rightColumn2'));


        Mail::send('mail.layouts.antworkDyn', $data, function ($message) {
            $message->from('john.rahme.test@gmail.com', 'John Rahme');

            $message->to(array('john.rahme.se@gmail.com'))->subject('Nyhetsbrev Test');

        });

        return Redirect::to('createdynmail');
    }


}
