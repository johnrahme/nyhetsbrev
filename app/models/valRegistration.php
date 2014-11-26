<?php

class valRegistration{

    public static $rules = array(
        'name' => 'required',
        'email' =>'required|confirmed|email'
    );


    public static function validate ($data){
        return Validator::make($data, static::$rules);
    }
}

