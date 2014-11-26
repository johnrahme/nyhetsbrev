<?php


class UserController extends BaseController
{
    public $restful = true;

    public function index()
    {
        return View::make('user.index')
            ->with('title', 'Admin');
    }
    public function newUser()
    {
        return View::make('user.new')
            ->with('title', 'New User');
    }
    public function createAdmin()
    {
        $user = new user;
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        return Redirect::to('user')
            ->with('message', 'The admin was created successfully. Alright!');
    }
}
