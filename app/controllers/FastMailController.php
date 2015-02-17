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

	}
}
