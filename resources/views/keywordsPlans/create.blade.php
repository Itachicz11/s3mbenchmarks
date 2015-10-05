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


				{{-- {!! Form::open(['route' => ['keywordsplans.store', $company], 'method' => 'POST', 'class' => 'form-horizontal keywords-plan-form']) !!} --}}
				{!! Form::model($keywordsPlan, ['route' => ['keywordsplans.store', 'company' => $company], 'method' => 'POST', 'class' => 'form-horizontal keywords-plan-form']) !!}


				<div class="row">				
					<div class="col-md-4 col-md-offset-4" style="margin-bottom: 20px;">
						{!! Form::label('Date') !!}
						{!! Form::date('date', null, ['class' => 'form-control']) !!}
					</div>


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

					<table class="table table-striped keywords-table">
						<thead>
							<tr>
								<th>Keyword</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($keywords as $i => $keyword)
							<tr class="keyword-row">
								<td scope="row">{!! Form::text('keyword['.$i.']', $keyword->text, ['class' => 'form-control']) !!}</td>
								<td class="action"><input type="button" class="btn btn-danger remove-keyword" value="Remove"></td>
							</tr>
							@endforeach
							<tr class="keyword-copy-row hidden">
								<td>{!! Form::text(null, null, ['class' => 'form-control']) !!}</td>
								<td class="action"><input type="button" class="btn btn-danger remove-keyword" value="Remove"></td>
							</tr>
						</tbody>
					</table>

					<div class="col-md-4 col-md-offset-4 text-center">
						{!! Form::submit('Create Plan', ['class' => 'btn btn-success btn-lg save-plan']); !!}
					</div>
				</div>


				{!! Form::close() !!}


			</div>
		</div>
	</div>
</div>
















@endsection