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
            $from = 'utbildning@futf.se';
            $sendName = 'Utbildningsutskottet-FUTF';
            foreach(utbildningsutskottet::all() as $person){
                $adress = $person->Email;
                array_push($receivers,$adress);
            }
        }
        if($rec == 'idrott'){
            $from = 'idrott@futf.se';
            $sendName = 'Idrottsutskottet-FUTF';
            foreach(idrottsutskottet::all() as $person){
                $adress = $person->Email;
                array_push($receivers,$adress);
            }
        }
        if($rec == 'klubb'){
            $from = 'klubbmastare@futf.se';
            $sendName = 'Klubbverket-FUTF';
            foreach(klubbverket::all() as $person){
                $adress = $person->Email;
                array_push($receivers,$adress);
            }
        }
        if($rec == 'arb'){
            $from = 'arbetsmarknad@futf.se';
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
