<div class = "modal fade" id = "send">
    <div class = "modal-dialog">
        <div class = "modal-content">
            {{ Form::open(array('route'=>array('emails.send', $email->id), 'method'=> 'get')) }}
             {{--Head--}}
            <div class = "modal-header">
                <h4>Vem ska det skickas till?</h4>

            </div>
            {{--Body--}}
            <div class = "modal-body">
                <div class = "checkbox">
                    <label>
                    {{Form::checkbox('all')}} Alla på F
                    </label>
                </div>
                <div class = "checkbox">
                    <label>
                    {{Form::checkbox('year1')}} Årskurs 1
                    </label>
                </div>
                <div class = "checkbox">
                    <label>
                    {{Form::checkbox('year2')}} Årskurs 2
                    </label>
                </div>
                <div class = "checkbox">
                    <label>
                    {{Form::checkbox('year3')}} Årskurs 3
                    </label>
                </div>
                <div class = "checkbox">
                    <label>
                    {{Form::checkbox('year4')}} Årskurs 4
                    </label>
                </div>
                <div class = "checkbox">
                    <label>
                    {{Form::checkbox('year5')}} Årskurs 5
                    </label>
                </div>
                <div class = "checkbox">
                    <label>
                    {{Form::checkbox('bord')}} Styrelsen
                    </label>
                </div>
                <div class = "checkbox">
                    <label>
                    {{Form::checkbox('it')}} it(at)futf.se
                    </label>
                </div>
                    {{ Form::submit('Skicka', array('class'=>'btn btn-success')) }}
                    <a href = "#" data-dismiss = "modal" class = "btn btn-default">Avbryt</a>
            </div>
            {{--Footer--}}

            {{ Form::close() }}
        </div>
    </div>
</div>
