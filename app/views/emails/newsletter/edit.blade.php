@extends('layouts.default')

@section('content')
	<h1> Edit the email {{ $email->name }}</h1>

    @include('common.users_errors')
	{{Form::open(array('route'=> 'emails.update','method' => 'put'))}}

		<p>
		{{Form::label('name', 'Namn')}} <br/>

		{{Form::text('name',$email->name)}}

	</p>

		{{Form::hidden('id', $email->id)}}
	
	<p> {{Form::submit('Update email')}} </p>

	{{Form::close()}}
	
@stop