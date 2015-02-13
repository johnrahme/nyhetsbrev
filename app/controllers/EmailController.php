<?php

class EmailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $emails = Email::orderBy('name')->get();
        return View::make('emails.newsletter.index')
            ->with('title', 'Nyhetsbrev')
            ->with('active', 'mail')
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
            ->with('title', 'Skapa Nyhetsbrev')
            ->with('active', 'mail');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validation = Email::validate(Input::all());

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
        $leftColumns = EmailData::where('emailId','=', $id)->where('position','=','left')->get();
        $bigColumns = EmailData::where('emailId','=', $id)->where('position','=','top')->get();
        $rightColumns = EmailData::where('emailId','=', $id)->where('position','=','right')->get();
        $mainHeader = Email::find($id)->name;

        return View::make('emails.newsletter.show')
            ->with('title', 'Visa Nyhetsbrev')
            ->with('active', 'mail')
            ->with('email',Email::find($id))
            ->with('leftColumns', $leftColumns)
            ->with('bigColumns', $bigColumns)
            ->with('rightColumns', $rightColumns)
            ->with('mainHeader', $mainHeader);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $columns = EmailData::where('emailId', '=',$id)->get();
        return View::make('emails.newsletter.edit')
            ->with('title', 'Edit email')
            ->with('active', 'mail')
            ->with('email',Email::find($id))
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

        $validation = Email::validate(Input::all());

        if($validation->fails()){
            return Redirect::route('emails.edit', $id)->withErrors($validation);
        }

        $email = Email::find($id);
        $email->name = Input::get('name');
        $email->save();

        return Redirect::route('emails.show', $id)
            ->with('message', 'Email update successfully');
	}


    public function addColumn(){


        $validation = EmailData::validate(Input::all());
        $id = Input::get('id');

        if($validation->fails()){
            return Redirect::route('emails.edit', $id)->withErrors($validation);
        }

        $emailData = new EmailData;
        $emailData->emailId = Input::get('id');
        $emailData->header = Input::get('columnH');
        $emailData->content = Input::get('column');
        $emailData->position = Input::get('position');

        if(Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName =str_replace(' ', '', microtime()).'_'.$imgName;
                Input::file('image')->move('img/emails', $saveName);
                $URL = 'img/emails/'.$saveName;
                $emailData->pictureUrl = $URL;
            }
        }



        $emailData->save();

        return Redirect::route('emails.edit', Input::get('id'))
            ->with('message', 'Column was added successfully');
    }

    public function emailPreview($id){
        $leftColumns = EmailData::where('emailId','=', $id)->where('position','=','left')->get();
        $bigColumns = EmailData::where('emailId','=', $id)->where('position','=','top')->get();
        $rightColumns = EmailData::where('emailId','=', $id)->where('position','=','right')->get();
        $mainHeader = Email::find($id)->name;


        return View::make('emails.layouts.antworkDynT')
            ->with('leftColumns', $leftColumns)
            ->with('bigColumns', $bigColumns)
            ->with('rightColumns', $rightColumns)
            ->with('mainHeader', $mainHeader);
    }
    public function emailSend($id){
        $leftColumns = EmailData::where('emailId','=', $id)->where('position','=','left')->get();
        $bigColumns = EmailData::where('emailId','=', $id)->where('position','=','top')->get();
        $rightColumns = EmailData::where('emailId','=', $id)->where('position','=','right')->get();
        $mainHeader = Email::find($id)->name;
        $receivers = array();
        $doneAdding = false;
        if(Input::has('all')){
            array_push($receivers,'arskurs1@futf.se', 'arskurs2@futf.se','arskurs3@futf.se','arskurs4@futf.se','arskurs5@futf.se');
            $doneAdding = true;
        }
        if(Input::has('year1')&&!$doneAdding){
            array_push($receivers, 'arskurs1@futf.se');
        }
        if(Input::has('year2')&&!$doneAdding){
            array_push($receivers, 'arskurs2@futf.se');
        }
        if(Input::has('year3')&&!$doneAdding){
            array_push($receivers, 'arskurs2@futf.se');
        }
        if(Input::has('year4')&&!$doneAdding){
            array_push($receivers, 'arskurs4@futf.se');
        }
        if(Input::has('year5')&&!$doneAdding){
            array_push($receivers, 'arskurs5@futf.se');
        }
        if(Input::has('bord')){
            array_push($receivers, 'styrelse@futf.se');
        }
        if(Input::has('it')){
            array_push($receivers, 'it@futf.se');
        }
        $data = array('leftColumns' => $leftColumns, 'bigColumns' => $bigColumns, 'rightColumns' => $rightColumns, 'mainHeader' => $mainHeader);
        Mail::send('emails.layouts.antworkDynT', $data, function ($message) use ($mainHeader, $receivers){
            $message->from('nyhetsbrev@futf.se', 'FUTF');
            $message->bcc($receivers)->subject($mainHeader);

        });

        return Redirect::to('emails')->with('message', 'Email skickat till '.implode(',',$receivers));
    }
    public  function editColumn($id){
        $column = EmailData::find($id);
        return View::make('emails.newsletter.editColumn')
            ->with('title', 'Edit Column')
            ->with('active', 'mail')
            ->with('column', $column);

    }

    public  function updateColumn (){
        $id = Input::get('id');
        $validation = EmailData::validate(Input::all());

        if($validation->fails()){
            return Redirect::route('emails.column.edit', $id)->withErrors($validation);
        }
        $emailData  = EmailData::find($id);
        $emailData->header = Input::get('columnH');
        $emailData->content = Input::get('column');
        $emailData->position = Input::get('position');

        //Jobbar med bilden:

        if(Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                if($emailData->pictureUrl != ""){
                    File::delete($emailData->pictureUrl);
                }
                $imgName = Input::file('image')->getClientOriginalName();
                $imgExtension = Input::file('image')->getClientOriginalExtension();
                $saveName =str_replace(' ', '', microtime()).'_'.$imgName;
                Input::file('image')->move('img/emails', $saveName);
                $URL = 'img/emails/'.$saveName;
                $emailData->pictureUrl = $URL;
            }
        }
        else{
            if(Input::get('pictureChanged') == 1){
                File::delete($emailData->pictureUrl);
                $emailData->pictureUrl = "";
            }


        }

        $emailData->save();
        return Redirect::route('emails.edit', $emailData->emailId)
            ->with('message', 'Column updated successfully');

    }
    public function destroyColumn()
    {
        $column = EmailData::find(Input::get('id'));
        $header = $column->header;
        $emailId = $column->emailId;
        if($column->pictureUrl != "") {
            File::delete($column->pictureUrl);
        }
        $column->delete();

        return Redirect::route('emails.edit', $emailId)
            ->with('message', htmlentities($header).' column was deleted');
    }
	public function destroy($id)
	{
        $id = Input::get('id');
        $email = Email::find($id);
        $name = $email->name;
        $emailDatas = EmailData::where('emailId','=',$id)->get();
        foreach($emailDatas as $emailData){
            $emailData->delete();
        }
        $email->delete();

        return Redirect::route('emails.index')
            ->with('message', htmlentities($name).' email was deleted successfully');
	}


}
