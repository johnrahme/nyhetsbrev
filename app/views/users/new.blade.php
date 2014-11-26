@extends('layouts.default')

@section('content')
	<h1> Create new User</h1>

	{{Form::open(array('url'=> 'user/create','files'=>true))}}

		<p>
		{{Form::label('username', 'Användarnamn')}} <br/>

		{{Form::text('username')}}

	</p>
	<p>
		{{Form::label('email', 'Email:')}} <br/>
		
		{{Form::text('email')}}
	</p>

    <p>
        {{Form::label('password', 'Lösenord')}} <br/>

        {{Form::password('password')}}

    </p>
    <p>
        {{Form::label('level', 'Level')}}
        {{Form::select('level', array('1' => '1', '2' => '2'), '1')}}
    </p>
	
	<p> {{Form::submit('Add Admin')}} </p>
	{{Form::close()}}
	
@stop