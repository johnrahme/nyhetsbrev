<?php

class EmailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $emails = email::orderBy('name')->get();
        return View::make('emails.newsletter.index')
            ->with('title', 'Nyhetsbrev')
            ->with('emails', $emails);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('emails.newsletter.create')
            ->with('title', 'Skapa Nyhetsbrev');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validation = email::validate(Input::all());

        if($validation->fails()){
            return Redirect::route('emails.create')->withErrors($validation)->withInput();
        }
		$email = new email;
        $email->name = Input::get('name');
        $email->save();

        return Redirect::to('emails')
            ->with('message', 'The email was created successfully. Alright!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('emails.newsletter.show')
            ->with('title', 'Visa Nyhetsbrev')->with('email',email::find($id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $columns = emailData::where('emailId', '=',$id)->get();
        return View::make('emails.newsletter.edit')
            ->with('title', 'Edit email')
            ->with('email',email::find($id))
            ->with('columns', $columns);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        $id = Input::get('id');

        $validation = email::validate(Input::all());

        if($validation->fails()){
            return Redirect::route('emails.edit', $id)->withErrors($validation);
        }

        $email = email::find($id);
        $email->name = Input::get('name');
        $email->save();

        return Redirect::route('emails.show', $id)
            ->with('message', 'Email update successfully');
	}


    public function addColumn(){


        $validation = emailData::validate(Input::all());
        $id = Input::get('id');

        if($validation->fails()){
            return Redirect::route('emails.edit', $id)->withErrors($validation);
        }

        $emailData = new emailData;
        $emailData->emailId = Input::get('id');
        $emailData->header = Input::get('columnH');
        $emailData->content = Input::get('column');
        $emailData->position = Input::get('position');
        $emailData->save();

        return Redirect::route('emails.edit', Input::get('id'))
            ->with('message', 'Column was added successfully');
    }

    public function emailPreview($id){
        $leftColumns = emailData::where('emailId','=', $id)->where('position','=','left')->get();
        $bigColumns = emailData::where('emailId','=', $id)->where('position','=','top')->get();
        $rightColumns = emailData::where('emailId','=', $id)->where('position','=','right')->get();
        $mainHeader = email::find($id)->header;


        return View::make('emails.layouts.antworkDynT')
            ->with('leftColumns', $leftColumns)
            ->with('bigColumns', $bigColumns)
            ->with('rightColumns', $rightColumns)
            ->with('mainHeader', $mainHeader);
    }
    public function destroyColumn()
    {
        $column = emailData::find(Input::get('id'));
        $header = $column->header;
        $emailId = $column->emailId;
        $column->delete();

        return Redirect::route('emails.edit', $emailId)
            ->with('message', htmlentities($header).' column was deleted');
    }
	public function destroy($id)
	{
        $id = Input::get('id');
        $email = email::find($id);
        $name = $email->name;
        $email->delete();

        return Redirect::route('emails.index')
            ->with('message', htmlentities($name).'User was deleted successfully');
	}


}
