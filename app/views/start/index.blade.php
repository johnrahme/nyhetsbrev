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
									<input type = "text" class = "form-control" id = "contact-name" name="contact-name" placeholder = "Namn" value = "">

								</div>

							</div>
							<div class = "form-group">
								<label for = "contact-email" class = "col-lg-2" control-label>Email</label>
								<div class = "col-lg-10">
									<input type = "email" class = "form-control" id = "contact-email" name = "contact-email" placeholder = "u@example.com">

								</div>

							</div>

							<div class = "form-group">
								<label for = "contact-email" class = "col-lg-2" control-label>Email igen </label>
								<div class = "col-lg-10">
									<input type = "email" class = "form-control" id = "contact-email-again" name = "contact-email-again" placeholder = "u@example.com">

								</div>

							</div>

							<div class = "form-group">
								<div class="checkbox">
								  <label>
									<input type="checkbox" name="utbildningsutskottet" id="option1" value="option1">
									Utbildningsutstkottet
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input type="checkbox" name="klubbverket" id="option2" value="option2">
									Klubbverket
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input type="checkbox" name="idrottsutskottet" id="option3" value="option3" >
									Idrottsutskottet
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input type="checkbox" name="arbetsmarknadsutskottet" id="option4" value="option4" >
									Arbetsmarknadsutskottet
								  </label>
								</div>

							</div>

						</div>
						<div class = "modal-footer">
							<button class = "btn btn-primary" type = "button" name = "connect" id = "connect" >Registrera</button>
						</div>
					{{Form::close()}}
				</div>

				<!--Maila!!-->

			</div>
		</div>

@stop