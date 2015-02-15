@extends('layouts.default')

@section('styles')

{{ HTML::style('summernote/css/summernote.css') }}
{{ HTML::style('summernote/css/css/font-awesome.min.css') }}
@stop

@section('content')
	<h1 class = 'text-center'> Ändra {{ $email->name }}</h1>

    @include('common.users_errors')

    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-12" style="border-bottom: 1px solid #808080; text-align: center" >
                <div class = "row">
                    <div class = "col-sm-4 col-sm-offset-4" style = "text-align: center">
                {{Form::open(array('route'=> 'emails.update','method' => 'put','id'=>'form1', 'files'=>true))}}

                 {{Form::label('name', 'Namn')}} <br/>

                 {{Form::text('name',$email->name, array('class'=>'form-control'))}}
            	{{Form::hidden('id', $email->id)}}
            	    </div>
                </div>
                <br>
            	<p>
            	  <button id="save" class="btn btn-primary" onclick="save()" type="button">Spara</button>
            	 {{link_to_route('emails.preview', 'Preview', array($email->id), array('class'=>'btn btn-primary'))}}
            	 {{link_to_route('emails.show', 'Tillbaka', array($email->id), array('class'=>'btn btn-default'))}}
                </p>
            </div>

        </div>
        <br>
        <div class = "row">
            <div class = "col-md-6">
            <h3>Lägg till kolumn</h3>
                <div class = "row">
                <div class = "col-sm-4">
                    <p>
                    {{Form::label('columnH', 'Rubrik')}} <a href="#" id = "header" class = 'popups' tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Header" data-content="Överskriften på din kolumn"><span class="glyphicon glyphicon-question-sign" style="font-size: 1.0em"></span></a><br/>
                    {{Form::text('columnH', '', array('class'=>'form-control'))}}
                    </p>
                </div>
                <div class = "col-sm-5">
                   <p>
                       {{Form::label('image', 'Bild')}} <br/>
                       {{ Form::file('image')}} <br/>
                   </p>

                </div>
                <div class = "col-sm-3">
                     <p>
                     {{Form::label('position', 'Position')}} <a href="#" id = "position" class = 'popups' tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Position" data-content="Bestämmer vart i nyhetsbrevet din kolumn ska hamna"><span class="glyphicon glyphicon-question-sign" style="font-size: 1.0em"></span></a> <br/>
                     {{Form::radio('position', 'top')}} Top<br>
                     {{Form::radio('position', 'left', true)}} Left<br>
                     {{Form::radio('position', 'right')}} Right
                     </p>
                </div>
                </div>
                <p>
                {{Form::label('column', 'Text')}} <a href="#" id = "text" class = 'popups' tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Text" data-content="Texten i din kolumn"><span class="glyphicon glyphicon-question-sign" style="font-size: 1.0em"></span></a><br/><br/>
                 <div class = "summernote" id="col">Skriv din text här!</div>
                 {{Form::hidden('column')}}
               </p>
               <p> <button id="add" class="btn btn-primary" onclick="save()" type="button">Lägg till kolumn</button> </p>
            </div>
            {{Form::close()}}
            <div class = "col-md-6">
            <h3>Existerande kolumner</h3>

                <div class="table-responsive">
                    <table class = "table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th data-sortable = "true">Header</th>
                        <th data-sortable = "true">Position</th>
                        <th data-sortable = "true">Edit</th>
                        <th data-sortable = "true">Delete</th>
                    </tr>
                    </thead>
                    <tbody class = "searchable">
                      @foreach ($columns as $column)
                       <tr>
                        <td>{{$column->header}} </td>
                        <td>{{$column->position}}</td>
                        <td>{{ link_to_route('emails.column.edit', 'Edit', array($column->id), array('class'=>'btn btn-sm btn-primary')) }}</td>

                        <td>{{ Form::open(array('route'=>'emails.column.destroy', 'method' =>'DELETE')) }}
                            {{ Form::hidden('id', $column->id)}}
                            {{ Form::submit('Delete', array('class'=>'btn btn-danger btn-sm')) }}
                            {{ Form::close() }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
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
   <script>
   $('.popups').popover().on('click', function(e) {e.preventDefault();});
   </script>

 @stop