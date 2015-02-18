@extends('layouts.default')
@section('styles')

{{ HTML::style('summernote/css/summernote.css') }}
{{ HTML::style('summernote/css/css/font-awesome.min.css') }}
@stop

@section('content')

<div class = "row">
    <div class = "col-md-12">
        {{Form::open(array('route'=> 'fastMail.store','files'=>true, 'id'=>'form1'))}}
        <div class = "row">
            <div class = "col-sm-3">
                    <div class = "form-group">
                        {{Form::label('name', 'Rubrik')}}
                        {{Form::text('name', '', array('class'=>'form-control'))}}
                    </div>
            </div>
        </div>

        {{Form::label('summernote', 'Text')}}
        <div class = "summernote" id="col">text</div>
        {{Form::hidden('text', '', array('id'=>'text'))}}


				<div class = "row">
				    {{--<div class = "col-md-4">--}}

				        {{--<div class = "form-group">--}}
				        {{--{{Form::label('receiver', 'Vilka ska få mailet?')}}--}}
                    								{{--<div class="checkbox">--}}
                    								  {{--<label>--}}
                    									{{--{{Form::checkbox('option1','option1')}}--}}
                    									{{--Utbildningsutstkottet--}}
                    								  {{--</label>--}}
                    								{{--</div>--}}
                    								{{--<div class="checkbox">--}}
                    								  {{--<label>--}}
                    									{{--{{Form::checkbox('option2','option2')}}--}}
                    									{{--Klubbverket--}}
                    								  {{--</label>--}}
                    								{{--</div>--}}
                    								{{--<div class="checkbox">--}}
                    								  {{--<label>--}}
                    									{{--{{Form::checkbox('option3','option3')}}--}}
                    									{{--Idrottsutskottet--}}
                    								  {{--</label>--}}
                    								{{--</div>--}}
                    								{{--<div class="checkbox">--}}
                    								  {{--<label>--}}
                    									{{--{{Form::checkbox('option4','option4')}}--}}
                    									{{--Arbetsmarknadsutskottet--}}
                    								  {{--</label>--}}
                    								{{--</div>--}}
                    	{{--</div>--}}
				    {{--</div>--}}
				    <div class ="col-md-4">
				        <div class = "form-group">
				         {{Form::label('from', 'Vem ska det skickas till?')}}<br>

                         {{Form::radio('receiver', 'utb', true)}} Utbildningsutskottet<br>
                         {{Form::radio('receiver', 'klubb')}} Klubbverket<br>
                         {{Form::radio('receiver', 'idrott')}} Idrottsutskottet<br>
                         {{Form::radio('receiver', 'arb')}} Arbetsmarknadsutskottet<br>

				        </div>
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
   height: 200,
   minHeight: 200,
   maxHeight: 200
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