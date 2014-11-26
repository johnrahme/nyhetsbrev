@extends('layouts.default')

@section('content')

<div class = "col-md-6">
					{{Form::open(array('route'=> 'download.get','method' => 'put', 'class' =>'form-horizontal'))}}
						<div class = "modal-header">
							<h4> Ladda ner maillistor</h4>
						</div>
						<div class = "modal-body">

							<div class = "form-group">
								<label for = "subject" control-label>Utskott</label>
									 <select class="form-control" name = "utskott">
									 <option value = "utbildningsutskottet">Utbildningsutskottet</option>
									 <option value = "klubbverket">Klubbverket</option>
									 <option value = "idrottsutskottet">Idrottsutskottet</option>
									 <option value = "arbetsmarknadsutskottet">Arbetsmarknadsutskottet</option>
									 </select>
							</div>

							<div class = "form-group">
									<label class="radio-inline">
									<input type="radio" checked = "checked" name="format" id="format1" value="csv"> CSV-fil
									</label>
									<label class="radio-inline">
									<input type="radio" name="format" id="format2" value="xls"> Excel-fil
									</label>
							</div>



						</div>
						<div class = "modal-footer">
							<button class = "btn btn-primary" type = "submit" name = "send" id = "send" >Ladda ner</button>
						</div>
					{{Form::close()}}
</div>



@stop