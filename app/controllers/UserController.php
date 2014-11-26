<?php


class UserController extends BaseController
{
    public $restful = true;

    public function index()
    {
        return View::make('users.index')
            ->with('title', 'User');
    }
    public function newUser()
    {
        return View::make('users.new')
            ->with('title', 'New Admin');
    }
    public function createUser()
    {
        $user = new user;
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->level = Input::get('level');
        $user->save();

        return Redirect::to('user')
            ->with('message', 'The admin was created successfully. Alright!');
    }
}
