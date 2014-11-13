 @extends('layouts.default')
 @section('styles')

<link href="summernote/css/css/font-awesome.min.css" rel="stylesheet">
<link href="summernote/css/summernote.css" rel="stylesheet">
 @stop

 @section('content')

    <div class="container-fluid">
        {{Form::open(array('url'=> 'senddynmail','files'=>true, 'id' => 'form1', 'name'=>'form1', 'target' => '_blank'))}}
        <div class = "row">

            <div class = "col-md-12">
                <p>
                <h1> Send new mail </h1>

                {{Form::label('header', 'Header')}} <br/>

                {{Form::text('header')}}

                </p>

                <p>
                {{Form::label('bigColumn', 'Big Column')}} <br/>
                <div class = "summernote" id="bigCol">Hello Summernote</div>
                </p>


             </div>
         </div>
        <div class = "row">
            <div class = "col-md-6">
                <p>
                {{Form::label('leftColumn1', 'Left Column 1')}} <br/>
                 <div class = "summernote" id="leftCol1">Hello Summernote</div>
               </p>
                <p>
                {{Form::label('leftColumn2', 'Left Column 2')}} <br/>
                <div class = "summernote" id="leftCol2">Hello Summernote</div>
                </p>


            </div>
            <div class = "col-md-6">
                <p>
                {{Form::label('rightColumn1', 'Right Column 1')}} <br/>
                <div class = "summernote" id="rightCol1">Hello Summernote</div>
                </p>
                <p>
                {{Form::label('rightColumn2', 'Right Column 2')}} <br/>
                <div class = "summernote" id="rightCol2">Hello Summernote</div>
                </p>
                <p> <button id="save" class="btn btn-primary" onclick="save()" type="button">Save</button> </p>

            </div>
        </div>
        {{Form::hidden('bigColumn')}}
        {{Form::hidden('leftColumn1')}}
        {{Form::hidden('leftColumn2')}}
        {{Form::hidden('rightColumn1')}}
        {{Form::hidden('rightColumn2')}}
        {{Form::close()}}
 	</div>



 @stop

 @section('scripts')

 <script src="summernote/js/summernote.min.js"></script>


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
        $("#bigColumn").val($('#bigCol').code());
        $("#leftColumn1").val($('#leftCol1').code());
        $("#leftColumn2").val($('#leftCol2').code());
        $("#rightColumn1").val($('#rightCol1').code());
        $("#rightColumn2").val($('#rightCol2').code());
        $("#form1").submit();

    });

   </script>

 @stop
