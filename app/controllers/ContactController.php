<?php


class ContactController extends BaseController
{
    public $restful = true;

    public function index()
    {
        return View::make('contact.index')
            ->with('title', 'Kontakt');
    }
    public function send()
    {
        $data = array('name' =>Input::get('contact-name'), 'email' =>Input::get('contact-email'), 'text' => Input::get('contact-text'));
        Mail::send('emails.contact.contact', $data, function($message)
        {
            $message->from(Input::get('contact-email'), Input::get('contact-name'));

            $message->to('alumnevent@futf.se')->subject('Eventidé');

        });
        return Redirect::to('contact/sent')
            ->with('name', Input::get('contact-name'));
    }
    public function sent()
    {

        return View::make('contact.sent')
            ->with('title', 'Skickat');
    }
}
