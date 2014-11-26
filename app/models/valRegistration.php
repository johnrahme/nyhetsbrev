<?php

class valRegistration{

    public static $rules = array(
        'contact-name' => 'required',
        'contact-email' =>'required|confirmed|email'
    );


    public static function validate ($data){
        return Validator::make($data, static::$rules);
    }
}

