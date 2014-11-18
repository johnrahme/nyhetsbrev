@extends('layouts.default')

@section('content')
	<h1> Add new Email</h1>

    @include('common.users_errors')
	{{Form::open(array('route'=> 'emails.store','files'=>true))}}

		<p>
		{{Form::label('name', 'Namn')}} <br/>

		{{Form::text('name')}}

	    </p>
	
	<p> {{Form::submit('Add Email')}} </p>
	{{Form::close()}}
	
@stop