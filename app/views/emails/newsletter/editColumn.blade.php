@extends('layouts.default')

@section('styles')

{{ HTML::style('summernote/css/summernote.css') }}
{{ HTML::style('summernote/css/css/font-awesome.min.css') }}
@stop

@section('content')
	<h1 class = 'text-center'> Edit Column {{ $column->label}}</h1>

    @include('common.users_errors')

    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-12">
                {{Form::open(array('route'=> 'emails.column.update','method' => 'put','id'=>'form1', 'files'=>true))}}
                <p>
                {{Form::label('columnH', 'Column header')}}<br/>
                {{Form::text('columnH', $column->header)}}
                </p>
                 <p>
                 {{Form::label('position', 'Position')}} <br/>

                 {{Form::radio('position', 'top')}} Top<br>
                 {{Form::radio('position', 'left')}} Left<br>
                 {{Form::radio('position', 'right')}} Right
                 </p>
                <p>
                {{Form::label('column', 'Column text')}} <br/>
                 <div class = "summernote" id="col">{{$column->content}}</div>
                 {{Form::hidden('column')}}
               </p>
               <p>
                {{Form::label('image', 'Bild')}} <br/>
                <div id = "oldPicture">{{Form::label('oldPictureL', 'The old Picture')}}<a href="#" id="remove_picture">X</a></div> <br/>
                <div id = "newPicture">
                    {{ Form::file('image')}} <br/>
                </div>
               </p>
               <p>
               <p> <button id="save" class="btn btn-primary" onclick="save()" type="button">Save Column</button> </p>
               </p>
            </div>
            {{Form::hidden('id',$column->id)}}
            {{Form::hidden('pictureChanged', 0, array('id' => 'pictureChanged'))}}
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
        $("#column").val($('#col').code());
        $("#form1").submit();
    });

   </script>
   <script>
   @if($column->position == "top")
   $('input:radio[name="position"]').filter('[value="top"]').attr('checked', true);
   @elseif($column->position == "left")
   $('input:radio[name="position"]').filter('[value="left"]').attr('checked', true);
   @else
   $('input:radio[name="position"]').filter('[value="right"]').attr('checked', true);
   @endif
   </script>

   <script>

   //Kollar om det finns en bild
   @if($column->pictureUrl != "")
       $('#oldPicture').show();
       $('#newPicture').hide();
       $("label[for = 'oldPictureL']").text('{{$column->pictureUrl}}');

   @else
       $('#oldPicture').hide();
       $('#newPicture').show();
   @endif

           $('#remove_picture').click(function(e){
           e.preventDefault();
           $('#oldPicture').hide();
           $('#newPicture').show();
           $('#pictureChanged').val(1);
           });

   </script>

 @stop