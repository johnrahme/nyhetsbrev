<?php


class RegistrationController extends BaseController
{
    public $restful = true;

    public function index()
    {
    }
    public function register()
    {
        $validation = valRegistration::validate(Input::all());

        if(!Input::has('option1')&&!Input::has('option2')&&!Input::has('option3')&&!Input::has('option4')){
            return Redirect::route('start')->with('failMessage', 'Du har inte valt något nyhetsbrev!')->withInput();
        }
        if($validation->fails()){
            return Redirect::to('/')->withErrors($validation)->withInput();
        }
        $utbTest = utbildningsutskottet::where('Email', '=', Input::get('email'))->get();
        if(Input::has('option1')&&$utbTest->isEmpty()){
            $utbild = new utbildningsutskottet;
            $utbild->name = Input::get('name');
            $utbild->email = Input::get('email');
            $utbild->save();
        }
        $klTest = klubbverket::where('Email', '=', Input::get('email'))->get();
        if(Input::has('option2')&&$klTest->isEmpty()){
            $klubb = new klubbverket;
            $klubb->name = Input::get('name');
            $klubb->email = Input::get('email');
            $klubb->save();

        }
        $idrTest = idrottsutskottet::where('Email', '=', Input::get('email'))->get();
        if(Input::has('option3')&&$idrTest->isEmpty()){
            $idrott = new idrottsutskottet;
            $idrott->name = Input::get('name');
            $idrott->email = Input::get('email');
            $idrott->save();

        }
        $arbTest = arbetsmarknadsutskottet::where('Email', '=', Input::get('email'))->get();
        if(Input::has('option4')&&$arbTest->isEmpty()){
            $arbet = new arbetsmarknadsutskottet;
            $arbet->name = Input::get('name');
            $arbet->email = Input::get('email');
            $arbet->save();

        }

        return Redirect::route('start')
            ->with('message', 'Du är registrerad!');
    }

}
