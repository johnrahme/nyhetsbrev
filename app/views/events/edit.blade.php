@extends('layouts.default')

@section('content')

<h1> Edit Event </h1>

@include('common.events_errors')
{{Form::open(array('url'=> 'events/update','files'=>true, 'method' => 'put'))}}

<p>
    {{Form::label('name', 'Namn')}} <br/>

    {{Form::text('name', $event->name)}}

</p>
<p>
    {{Form::label('dateTimeFrom', 'Starttid')}} <br/>

    {{Form::input('datepicker', 'dateTimeFrom', $event->dateTimeFrom)}}


</p>

<p>
    {{Form::label('dateTimeTo', 'Sluttid')}} <br/>

    {{Form::input('datetime', 'dateTimeTo', $event->dateTimeTo)}}


</p>
<p>
    {{Form::label('description', 'Beskrivning')}} <br/>

    {{Form::textarea('description', $event->description)}}
</p>

<p>
    {{Form::label('place', 'Plats')}} <br/>

    {{Form::text('place', $event->place)}}

</p>


<p>
    {{Form::label('publish', 'Online')}} <br/>

    {{Form::checkbox('publish', 'Check', $event->publish)}}

</p>

<p>
    {{Form::label('image', 'Bild')}} <br/>
    <div id = "oldPicture">{{Form::label('oldPictureL', 'The old Picture')}}<a href="#" id="remove_picture">X</a></div> <br/>
    <div id = "newPicture">
        {{ Form::file('image')}} <br/>
    </div>

</p>

<p>
    @if($editExtra == 1)
    {{Form::label('reg', 'Ska man kunna registrera sig till eventet?')}}  <br/>
    {{Form::checkbox('reg', 'Check', $event->reg)}} <br/>
    @else
    {{Form::hidden('reg', $event->reg)}}
    @endif
</p>

    @if($event->reg == 1)
        <div id = "registrering">
    @else
        <div id = "registrering" style = "display: none;">
    @endif

    <p>
        {{Form::label('regnr', 'Antal som kan registrera sig')}} <br/>

        {{Form::input('number', 'regnr', $event->regnr)}}


    </p>
    <p>

        @if($editExtra == true)
        {{Form::label('reserv', 'Kan man anmäla sig som reserv?')}}  <br/>
        {{Form::checkbox('reserv', 'Check', $event->reserv)}} <br/>

        @else
        {{Form::hidden('reserv', $event->reserv)}}
        @endif
    </p>
    <p>
        {{Form::label('extra', 'Lägg till extra fält för anmälan')}}  <br/>
    <div id = "wrapper">
        {{Form::button('Lägg till', array('id'=>'addEx'))}}
        @foreach($extra as $ex)

            @if($ex->title != "")
                @if($editExtra == false)
                    <div><input type="text"  readonly value = {{$ex->title}} name="extras[]" id="extras[]"/></div>
                @else
                    <div><input type="text"  value = {{$ex->title}} name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a></div>
                @endif
            @else
                @if($editExtra == false)
                    <div><input type="text" value = "" readonly name="extras[]" id="extras[]"/></div>
                @else
                    <div><input type="text" value = "" name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a></div>
                @endif
            @endif

        @endforeach


    </div>
    </p>

</div>

{{Form::hidden('id', $event->id)}}
{{Form::hidden('pictureChanged', 0, array('id' => 'pictureChanged'))}}

<p> {{Form::submit('Update event')}} </p>
{{Form::close()}}

@stop

@section('scripts')

{{HTML::script('js/datetimepickerconfig.js')}}

<script>

//Kollar om det finns en bild
@if($event->pictureUrl != "")
    $('#oldPicture').show();
    $('#newPicture').hide();
    $("label[for = 'oldPictureL']").text('{{$event->pictureUrl}}');

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


<script>


//Det går inte att ändra anmälan när det redan finns anmälda

        @if($editExtra == false)
            document.getElementById("addEx").disabled = true;
            document.getElementById("regnr").readOnly = true;
        @endif



</script>

@if($editExtra == true)
<script>

//Lägger till registreringsfält
    $(document).ready(function(){
        $('#reg').change(function(){
            if(!this.checked){
                $('#registrering').hide();
            }
            else{
                $('#registrering').show();
            }
        });
        //Extra fält:
        var max_fields = 5;

        var x = {{$extra->count()}};
        $('#addEx').click(function(e){
            e.preventDefault();
            if(x<max_fields) {
                x++;
                var ex = "extra";
                var fieldID = ex.concat(ex);

                $("#wrapper").append('<div><input type="text" name="extras[]" id="extras[]"/><a href="#" id="remove_field">X</a></div>'); //add input box
            }
        });
        $("#wrapper").on("click","#remove_field", function(e){ //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
</script>
@endif


@stop