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
        return Redirect::route('fastMail.index')
            ->with('message', htmlentities($text));
	}
}
