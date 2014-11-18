@extends('layouts.default')

@section('styles')

{{ HTML::style('summernote/css/summernote.css') }}
{{ HTML::style('summernote/css/css/font-awesome.min.css') }}
@stop

@section('content')
	<h1 class = 'text-center'> Edit {{ $email->name }}</h1>

    @include('common.users_errors')

    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-12" style="border-bottom: 1px solid #808080">
                {{Form::open(array('route'=> 'emails.update','method' => 'put','id'=>'form1'))}}

            		<p class = 'text-center'>
            		{{Form::label('name', 'Namn')}} <br/>

            		{{Form::text('name',$email->name)}}

            	</p>

            		{{Form::hidden('id', $email->id)}}

            	<p class = 'text-center'> <button id="save" class="btn btn-primary" onclick="save()" type="button">Save</button> </p>

            	<p class = 'text-center'>
            	{{link_to_route('emails.preview', 'Preview', array($email->id))}}
            	</p>



            </div>

        </div>
        <br>
        <div class = "row">
            <div class = "col-md-6">

                <p>
                {{Form::label('columnH', 'Column header')}}<br/>
                {{Form::text('columnH')}}
                </p>
                 <p>
                 {{Form::label('position', 'Position')}} <br/>
                 {{Form::radio('position', 'top')}} Top<br>
                 {{Form::radio('position', 'left', true)}} Left<br>
                 {{Form::radio('position', 'right')}} Right
                 </p>
                <p>
                {{Form::label('column', 'Column text')}} <br/>
                 <div class = "summernote" id="col">Skriv din text här!</div>
                 {{Form::hidden('column')}}
               </p>
               <p>
               <p> <button id="add" class="btn btn-primary" onclick="save()" type="button">Add Column</button> </p>
               </p>
            </div>
            {{Form::close()}}
            <div class = "col-md-6">
            <h3>Colonner</h3>

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
                        <td>edit</td>
                        <td>{{ Form::open(array('route'=>'emails.column.destroy', 'method' =>'DELETE')) }}
                                                            {{ Form::hidden('id', $column->id)}}
                                                            {{ Form::submit('Delete') }}
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

 @stop