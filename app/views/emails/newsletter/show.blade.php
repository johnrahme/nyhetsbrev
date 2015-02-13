@extends('layouts.default')

@section('content')
@include('emails.newsletter.del')
@include('emails.newsletter.send')

    <div class = "row">
        <div class = "col-md-12">
            <div class = "page-header" style = "margin-top:0">
                <h1> {{{$email->name}}} </h1>
            </div>

            {{ Form::hidden('id', $email->id)}}
            <span>
            {{link_to_route('emails.index', 'Emails','' ,array('class'=>'btn btn-primary'))}}
            {{ link_to_route('emails.edit', 'Ändra', array($email->id), array('class'=>'btn btn-primary')) }}
            @if(Auth::user()->level==2)
            <a href = "#send" data-toggle = "modal" class = "btn btn-success">Skicka</a>
            @endif
            <a href = "#del" data-toggle = "modal" class = "btn btn-danger">Radera</a>

            </span>
        </div>
    </div>
    <div class = "row">
        <div class = "col-md-12"style="margin-top: 10px">
               @include('emails.layouts.antworkDynT')

        </div>

    </div>

	
@stop