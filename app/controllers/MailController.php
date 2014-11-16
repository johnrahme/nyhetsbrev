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

        Mail::send('mail.layouts.an', array('test' => 'test'), function ($message) {
            $message->from('it@futf.se', 'John Rahme');

            $message->to(array('styrelse@futf.se'))->subject('Nyhetsbrev Test');

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

        return View::make('mail.layouts.antworkDynT')
            ->with('header', Input::get('header'))
            ->with('bigColumn', Input::get('bigColumn'))
            ->with('leftColumn1', Input::get('leftColumn1'))
            ->with('leftColumn2', Input::get('leftColumn2'))
            ->with('rightColumn1', Input::get('rightColumn1'))
            ->with('rightColumn2', Input::get('rightColumn2'))
            ->with('bigColumnH', Input::get('bigColumnH'))
            ->with('leftColumn1H', Input::get('leftColumn1H'))
            ->with('leftColumn2H', Input::get('leftColumn2H'))
            ->with('rightColumn1H', Input::get('rightColumn1H'))
            ->with('rightColumn2H', Input::get('rightColumn2H'));

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
            'rightColumn2' => Input::get('rightColumn2'),
            'bigColumnH' => Input::get('bigColumnH'),
            'leftColumn1H' => Input::get('leftColumn1H'),
            'leftColumn2H' => Input::get('leftColumn2H'),
            'rightColumn1H' => Input::get('rightColumn1H'),
            'rightColumn2H' => Input::get('rightColumn2H'));


        Mail::send('mail.layouts.antworkDynT', $data, function ($message) {
            $message->from('it@futf.se', 'John Rahme');

            $message->bcc(array('john.rahme.se@gmail.com', 'john.rahme.test@gmail.com', 'john_rahme92@hotmail.com'))->subject(Input::get('header'));

        });

        return Redirect::to('createdynmail');
    }


}
