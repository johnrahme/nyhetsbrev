@extends('layouts.default')
@section('styles')

{{ HTML::style('summernote/css/summernote.css') }}
{{ HTML::style('summernote/css/css/font-awesome.min.css') }}
@stop

@section('content')

<div class = "row">
    <div class = "col-md-12">
        {{Form::open(array('route'=> 'fastMail.store','files'=>true, 'id'=>'form1'))}}
        <div class = "form-group">
            {{Form::label('name', 'Rubrik')}}
            {{Form::text('name', '', array('class'=>'form-control'))}}
        </div>
        {{Form::label('summernote', 'Text')}}
        <div class = "summernote" id="col">text</div>
        {{Form::label('receiver', 'Vilka ska få mailet?')}}
        {{Form::hidden('text', '', array('id'=>'text'))}}

        <div class = "form-group">
								<div class="checkbox">
								  <label>
									{{Form::checkbox('option1','option1')}}
									Utbildningsutstkottet
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									{{Form::checkbox('option2','option2')}}
									Klubbverket
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									{{Form::checkbox('option3','option3')}}
									Idrottsutskottet
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									{{Form::checkbox('option4','option4')}}
									Arbetsmarknadsutskottet
								  </label>
								</div>
				</div>
		{{Form::button('Skicka!', array('id'=>'save', 'class'=>'btn btn-success'))}}
        {{Form::close()}}
    </div>

</div>


@stop
@section('scripts')
{{HTML::script('summernote/js/summernote.min.js')}}

 <script>
 $(document).ready(function() {
   $('.summernote').summernote({
   height: 300,
   minHeight: 300,
   maxHeight: 300
   });
 });
 </script>
<script>
     $("#save").click(function(){
         $('#text').val($('#col').code());
         $("#form1").submit();
     });
</script>
@stop