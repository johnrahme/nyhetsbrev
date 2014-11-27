<?php


class UserController extends BaseController
{
    public $restful = true;

    public function index()
    {
        return View::make('users.index')
            ->with('active', 'users')
            ->with('title', 'User');
    }
    public function newUser()
    {
        return View::make('users.new')
            ->with('active', 'users')
            ->with('title', 'New Admin');
    }
    public function createUser()
    {
        $validation = user::validate(Input::all());

        if($validation->fails()){
            return Redirect::route('new_user')->withErrors($validation)->withInput();
        }
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
