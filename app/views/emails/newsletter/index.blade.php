@extends('layouts.default')

@section('content')

	<p>{{ link_to_route('emails.create', 'Lägg till email', array(), array('class'=>'btn btn-primary', 'role' =>'button')) }}</p>
	<div class = "row">
        <div class="col-md-4">{{Form::text('search', '', array('id' => 'search', 'placeholder' => 'Sök...','class' => 'form-control'))}}</div>
    </div>
    </br>
    <div class = "row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class = "table table-striped table-bordered">
                <thead>
                <tr>
                    <th data-sortable = "true">Namn</th>
                    <th data-sortable = "true">Senast editerad</th>
                </tr>
                </thead>
                <tbody class = "searchable">
                  @foreach ($emails as $email)
                   <tr>
                    <td>{{link_to_route('emails.show',$email->name, array($email->id))}} </td>
                    <td>{{$email->updated_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')

<script>
    (function ($) {

        $('#search').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));
</script>
@stop