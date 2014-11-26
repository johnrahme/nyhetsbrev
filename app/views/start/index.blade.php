@extends('layouts.default')

@section('content')

<div class ="container">
			<div class = "jumbotron text-center">
			<h1> Roligt att du vill engagera dig! </h1>
			<p> Anmäl dig nedan för att få information och nyhetsbrev från de olika utskotten hos FUTF </p>

		</div>
		<div class = "container">
			<div class = "row">

			<!--Registrera!!-->
				<div class = "col-md-6">
					{{Form::open(array('route'=> 'signup','method' => 'put','id'=>'contactform', 'class' =>'form-horizontal'))}}
						<div class = "modal-header">
							<h4> Nyhetsbrev</h4>
						</div>
						<div class = "modal-body">

							<div class = "form-group">

								<label for = "contact-name" class = "col-lg-2" control-label>Namn</label>
								<div class = "col-lg-10">
									{{Form::text('contact-name','',array('class'=>'form-control', 'placeholder' =>'Namn'))}}

								</div>

							</div>
							<div class = "form-group">
								<label for = "contact-email" class = "col-lg-2" control-label>Email</label>
								<div class = "col-lg-10">
									{{Form::email('contact-email','',array('class'=>'form-control', 'placeholder' =>'u@example.com'))}}

								</div>

							</div>

							<div class = "form-group">
								<label for = "contact-email" class = "col-lg-2" control-label>Email igen </label>
								<div class = "col-lg-10">
									{{Form::email('contact-email_confirmation','',array('class'=>'form-control', 'placeholder' =>'u@example.com'))}}

								</div>

							</div>

							<div class = "form-group">
								<div class="checkbox">
								  <label>
									{{Form::checkbox('option1','option1', true)}}
									Utbildningsutstkottet
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									{{Form::checkbox('option2','option2', true)}}
									Klubbverket
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									{{Form::checkbox('option3','option3', true)}}
									Idrottsutskottet
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									{{Form::checkbox('option4','option4', true)}}
									Arbetsmarknadsutskottet
								  </label>
								</div>

							</div>

						</div>
						<div class = "modal-footer">
							<button class = "btn btn-primary" type = "submit" name = "connect" id = "connect" >Registrera</button>
						</div>
					{{Form::close()}}
				</div>

				<!--Maila!!-->

			</div>
		</div>

@stop