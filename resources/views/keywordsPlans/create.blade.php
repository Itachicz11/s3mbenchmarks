@extends('layouts.master')

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/cities_table.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/keywords_table.js') }}"></script>
@stop

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<h4 class="panel-heading text-center">Create Keywords Plan</h4>
			<div class="panel-body">
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif


				{!! Form::model($keywordsPlan, ['route' => ['keywordsplans.store', 'company' => $company], 'method' => 'POST', 'class' => 'form-horizontal keywords-plan-form']) !!}

					<div class="row form-group">
				        <div class="col-xs-12">
				            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
				                <li class="active"><a href="#step-1">
				                    <h4 class="list-group-item-heading">Step 1</h4>
				                    <p class="list-group-item-text">Date</p>
				                </a></li>
				                <li class="disabled"><a href="#step-2">
				                    <h4 class="list-group-item-heading">Step 2</h4>
				                    <p class="list-group-item-text">Cities</p>
				                </a></li>
				                <li class="disabled"><a href="#step-3">
				                    <h4 class="list-group-item-heading">Step 3</h4>
				                    <p class="list-group-item-text">Keywords</p>
				                </a></li>
				            </ul>
				        </div>
					</div>

				    <div class="row setup-content" id="step-1">
				        <div class="col-xs-12">
				            <div class="col-md-12 well text-center">

				                <div class="col-md-4 col-md-offset-4">
				                	{!! Form::date('date', null, ['class' => 'form-control']) !!}
				                </div>

				                <div class="col-md-12">
				                	<button id="activate-step-2" class="btn btn-primary btn-lg second-step">Next Step</button>
				                </div>

				            </div>
				        </div>
				    </div>
				    <div class="row setup-content" id="step-2">
				        <div class="col-xs-12">
				            <div class="col-md-12 well text-center">

				            	{!! Form::text('cities', null, ['class' => 'hidden']) !!}

				                <table class="table table-striped cities-table">
				                	<thead>
				                		<tr>
				                			<th>City</th>
				                			<th>Action</th>
				                		</tr>
				                	</thead>
				                	<tbody>
				                		<tr>
				                			<td scope="row">{!! Form::text(null, null, ['class' => 'form-control city-input']) !!}</td>
				                			<td scope="row"><a href="#" class="btn btn-info add-city">Add City</a></td>
				                		</tr>
				                		<tr class="city-copy-row hidden">
				                			<td class="city"></td>
				                			<td class="action"><input type="button" class="btn btn-danger remove-city" value="Remove"></td>
				                		</tr>
				                	</tbody>
				                </table>

				                <button id="activate-step-3" class="btn btn-primary btn-lg step-cities">Next Step</button>
				            </div>
				        </div>
				    </div>
				    <div class="row setup-content" id="step-3">
				        <div class="col-xs-12">
				            <div class="col-md-12 well">


				            	{!! Form::text('keywords', null, ['class' => 'hidden', 'placeholder' => 'JSON data']) !!}


				            	<table class="table table-striped keywords-table">
				            		<thead>
				            			<tr>
				            				<th>Keyword</th>
				            				<th>City</th>
				            				<th>Action</th>
				            			</tr>
				            		</thead>
				            		<tbody>
				            			<tr>
				            				<td scope="row">{!! Form::text(null, null, ['class' => 'form-control keyword-input']) !!}</td>
				            				<td scope="row">{!! Form::select(null, array(), null, ['class' => 'form-control city-select']) !!}</td>
				            				<td scope="row"><a href="#" class="btn btn-primary add-keyword">Add keyword</a></td>
				            			</tr>
				            			<tr class="keyword-copy-row hidden">
				            				<td class="keyword"></td>
				            				<td class="city"></td>
				            				<td class="action"><input type="button" class="btn btn-danger remove-keyword" value="Remove"></td>
				            			</tr>
				            		</tbody>
				            	</table>

				            </div>

			            	<div class="col-md-12 text-center">
			            		{!! Form::submit('Save Plan', ['class' => 'btn btn-success btn-lg save-plan']); !!}
			            	</div>

				        </div>
				    </div>

				{!! Form::close() !!}


			</div>
		</div>
	</div>
</div>
















@endsection