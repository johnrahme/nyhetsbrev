@extends('layouts.default')

@section('content')

	<h1> {{{$email->name}}} </h1>

    <span>
    {{link_to_route('emails.index', 'Emails')}}|
    {{ link_to_route('emails.edit', 'Edit', array($email->id)) }}|

    {{ Form::open(array('route'=>'emails.destroy', 'method' =>'DELETE')) }}
    {{ Form::hidden('id', $email->id)}}
    {{ Form::submit('Delete') }}
    {{ Form::close() }}

    </span>
	
@stop