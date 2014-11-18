@extends('layouts.default')

@section('styles')

{{ HTML::style('summernote/css/summernote.css') }}
{{ HTML::style('summernote/css/css/font-awesome.min.css') }}
@stop

@section('content')
	<h1> Edit the email {{ $email->name }}</h1>

    @include('common.users_errors')

    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-12">
                {{Form::open(array('route'=> 'emails.update','method' => 'post','id'=>'form1'))}}

            		<p>
            		{{Form::label('name', 'Namn')}} <br/>

            		{{Form::text('name',$email->name)}}

            	</p>

            		{{Form::hidden('id', $email->id)}}

            	<p> <button id="save" class="btn btn-primary" onclick="save()" type="button">Save</button> </p>



            </div>

        </div>
        <div class = "row">
            <div class = "col-md-12">

                <p>
                {{Form::label('columnH', 'Column header')}}<br/>
                {{Form::text('columnH')}}
                </p>
                 <p>
                 {{Form::label('position', 'Position')}} <br/>
                 {{Form::radio('position', 'left', true)}} Left<br>
                 {{Form::radio('position', 'middle')}} Center<br>
                 {{Form::radio('position', 'left')}} Right
                 </p>
                <p>
                {{Form::label('col', 'Column text')}} <br/>
                 <div class = "summernote" id="column">Hello Summernote</div>
                 {{Form::hidden('column')}}
               </p>
               <p>
               <p> <button id="add" class="btn btn-primary" onclick="save()" type="button">Add Column</button> </p>
               </p>
            </div>
            {{Form::close()}}
        </div>
    </div>

@stop

@section('scripts')


 {{HTML::script('summernote/js/summernote.min.js')}}

 <script>
 $(document).ready(function() {
   $('.summernote').summernote({
   width: 450,
   height: 400,
   minHeight: 400,
   maxHeight: 400
   });
 });
 </script>
   <script>

    $("#save").click(function(){
        $("#form1").submit();

    });
    $("#add").click(function(){
        $("#column").val($('#col').code());
        $("#form1").attr("action", "addcolumn");
        $("#form1").submit();
    });

   </script>

 @stop