@extends('layouts.master')

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/cities_table.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/keywords_table.js') }}"></script>
@stop

@section('content')


<div class="grid simple">
	<div class="grid-title"><h4>Create Keywords Plan</h4></div>
	<div class="grid-body">

		{!! Form::open(['route' => ['keywordsplans.store', 'company' => $company], 'method' => 'POST', 'class' => 'steps-form']) !!}
			<!-- FORM -->
			<div id="rootwizard">
				<div class="form-wizard-steps">
					<ul class="wizard-steps">
					  	<li class="active"><a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Date</span></a></li>
						<li><a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Keywords</span></a></li>
						<li><a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Cities</span></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="tab-content">

				    <div class="tab-pane active" id="tab1">

						<div class="form-group">
							<div class="input-group with-addon">							
								<span class="input-group-addon success">
									<span class="arrow"></span>
									<i class="fa fa-align-justify"></i>
								</span>
								{!! Form::text('date', '', ['class' => 'benchmark-date', 'placeholder' => 'mm/dd/yy', 'required' => '']) !!}
							</div>
							{{ Form::label('date', ' ', ['class' => 'error']) }}
						</div>

				    </div>


				    <div class="tab-pane" id="tab2">

						<br>
						<br>
						{{-- <h4 class="semi-bold">Step 1 - <span class="light">Basic Information</span></h4> --}}
						<div class="row column-seperation">
							<div class="col-md-5">
								<div class="row form-row">
									<div class="col-md-8">
										{!! Form::text(null, null, ['class' => 'form-control keyword-input', 'placeholder' => 'keyword']) !!}
									</div>
									<div class="col-md-4">
										<a href="javascript:;" class="btn btn-primary add-keyword">Add keyword</a>
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="keyword-list clearfix">							
									<div class="keyword-copy-row clearfix hidden">
										<div class="part">{!! Form::text(null, null, ['class' => 'form-control keyword']) !!}</div>
										<div class="part"><input type="button" class="btn btn-danger remove-keyword" value="Remove"></div>
									</div>
								</div>
							</div>
						</div>

				    </div>

					<div class="tab-pane" id="tab3">


						<br>
						<br>
						{{-- <h4 class="semi-bold">Step 1 - <span class="light">Basic Information</span></h4> --}}
						<div class="row column-seperation">
							<div class="col-md-5">
								<div class="row form-row">
									<div class="col-md-8">
										{!! Form::text(null, null, ['class' => 'form-control city-input', 'placeholder' => 'city']) !!}
									</div>
									<div class="col-md-4">
										<a href="javascript:;" class="btn btn-primary add-city">Add city</a>
									</div>
								</div>
								{!! Form::submit('Create keywords plan', ['class' => 'btn btn-success']) !!}
							</div>
							<div class="col-md-7">
								<div class="city-list clearfix">							
									<div class="city-copy-row hidden">
										<div class="part">{!! Form::text(null, null, ['class' => 'form-control city']) !!}</div>
										<div class="part"><input type="button" class="btn btn-danger remove-city" value="Remove"></div>
									</div>
								</div>
							</div>
						</div>

				    </div>

				    <div class="tab-pane" id="tab4">
					    <p>the end</p>
				    </div>

					<ul class="wizard-actions wizard">
						<li class="previous first" style="display:none;"><a href="javascript:;" class="btn">First</a></li>
						<li class="previous"><a href="javascript:;" class="btn">Previous</a></li>
						<li class="next last" style="display:none;"><a href="javascript:;" class="btn btn-primary">Last</a></li>
					  	<li class="next"><a href="javascript:;" class="btn btn-primary">Next</a></li>
					</ul>
				</div>	
			</div>
		{!! Form::close() !!}

	</div>
</div>





@endsection