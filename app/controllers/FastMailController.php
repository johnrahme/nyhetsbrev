<?php

class FastMailController extends \BaseController {

	public function index()
	{
        return View::make('fastMail.index')
            ->with('title', 'Fast Mail')
            ->with('active', 'mail');
	}
	public function store()
	{
        $name = Input::get('name');
        $text = Input::get('text');
        $rec = Input::get('receiver');

        $receivers = array();
        if($rec == 'utb'){
            $from = 'alumnsida@futf.se';
            $sendName = 'Utbildningsutskottet-FUTF';
            foreach(utbildningsutskottet::all() as $person){
                $adress = $person->Email;
                array_push($receivers,$adress);
            }
        }
        if($rec == 'idrott'){
            $from = 'john_rahme92@hotmail.com';
            $sendName = 'Idrottsutskottet-FUTF';
            foreach(idrottsutskottet::all() as $person){
                $adress = $person->Email;
                array_push($receivers,$adress);
            }
        }
        if($rec == 'klubb'){
            $from = 'john_rahme92@hotmail.com';
            $sendName = 'Klubbverket-FUTF';
            foreach(klubbverket::all() as $person){
                $adress = $person->Email;
                array_push($receivers,$adress);
            }
        }
        if($rec == 'arb'){
            $from = 'john_rahme92@hotmail.com';
            $sendName = 'Arbetsmarknadsutskottet-FUTF';
            foreach(arbetsmarknadsutskottet::all() as $person){
                $adress = $person->Email;
                array_push($receivers,$adress);
            }
        }
        $koll = implode(',',$receivers);

        $data = array('utskott' => $rec, 'text'=>$text);
        Mail::send('fastMail.layout.main', $data, function ($message) use ($name, $receivers,$from,$sendName ){
            $message->from($from, $sendName);
            $message->bcc($receivers)->subject($name);

        });


        return Redirect::route('fastMail.index')
            ->with('message', $koll);
	}
}
