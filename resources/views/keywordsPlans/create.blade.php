@extends('layouts.master')

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/cities_table.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/keywords_table.js') }}"></script>
@stop

@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="panel-heading text-center">Create Keywords Plan</h4>
			<div class="panel-body">


				<div class="success-wrapper hidden">
					<p>Keywords plan was successfully created.</p>
					{!! link_to_route('companies.show', 'OK', ['company' => $company->id], ['class' => 'btn btn-primary']) !!}
				</div>

				<div class="form-wrapper">
					<div class="alert alert-danger hidden">
						<ul>
						</ul>
					</div>


					{{-- {!! Form::open(['route' => ['keywordsplans.store', $company], 'method' => 'POST', 'class' => 'form-horizontal keywords-plan-form']) !!} --}}
					{!! Form::open(['route' => ['keywordsplans.store', 'company' => $company], 'method' => 'POST', 'class' => 'form-horizontal keywords-plan-form']) !!}

					<div class="row">
						<div class="col-md-4 col-md-offset-4" style="margin-bottom: 20px;">
							{!! Form::label('Date') !!}
							{!! Form::date('date', null, ['class' => 'form-control']) !!}
						</div>

						<div class="col-md-8">

							<table class="table table-stripped">
								<thead>
									<tr>
										<th>Add Keyword</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td scope="row">{!! Form::text(null, null, ['class' => 'form-control keyword-input']) !!}</td>
										<td scope="row"><a href="#" class="btn btn-primary add-keyword">Add keyword</a></td>
									</tr>
								</tbody>
							</table>

							<table class="table table-striped keyword-table">
								<thead>
									<tr>
										<th>Keyword</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr class="keyword-copy-row hidden">
										<td>{!! Form::text(null, null, ['class' => 'form-control keyword']) !!}</td>
										<td class="action"><input type="button" class="btn btn-danger remove-keyword" value="Remove"></td>
									</tr>
								</tbody>
							</table>
						</div>


						<div class="col-md-4">

							<table class="table table-stripped">
								<thead>
									<tr>
										<th>Add City</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td scope="row">{!! Form::text(null, null, ['class' => 'form-control city-input']) !!}</td>
										<td scope="row"><a href="#" class="btn btn-primary add-city">Add city</a></td>
									</tr>
								</tbody>
							</table>

							<table class="table table-striped city-table">
								<thead>
									<tr>
										<th>City</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr class="city-copy-row hidden">
										<td>{!! Form::text(null, null, ['class' => 'form-control city']) !!}</td>
										<td class="action"><input type="button" class="btn btn-danger remove-city" value="Remove"></td>
									</tr>
								</tbody>
							</table>
						</div>


						<div class="col-md-4 col-md-offset-4 text-center">
							{!! Form::submit('Create Plan', ['class' => 'btn btn-success btn-lg save-plan']); !!}
						</div>
					</div>


					{!! Form::close() !!}
				</div>


			</div>
		</div>
	</div>
</div>


@endsection