@extends('layouts.default')
@section('styles')
    		{{ HTML::style('wusiwug/css/bootstrap-wysihtml5.css') }}
    		{{ HTML::style('wusiwug/css/bootstrap.min.css') }}
@stop

@section('content')

{{--	<h1> Send new mail </h1>

	{{Form::open(array('url'=> 'viewdynmail','files'=>true))}}

		<p>
		{{Form::label('header', 'Header')}} <br/>

		{{Form::text('header')}}

	    </p>
	    <p>
        {{Form::label('text1', "Please enter the text!")}} <br/>
	    {{Form::textarea('text1')}}


	    </p>

	<p> {{Form::submit('View')}} </p>
	{{Form::close()}}--}}

	<textarea id="some-textarea" placeholder="Enter text ..."></textarea>
@stop

@section("scripts")

		<script src="wusiwug/js/wysihtml5-0.3.0.js"></script>
		<script src="wusiwug/js/bootstrap-wysihtml5.js"></script>

<script type="text/javascript">
	$('#some-textarea').wysihtml5();
</script>
@stop