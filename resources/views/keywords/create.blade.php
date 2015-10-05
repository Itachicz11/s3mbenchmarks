@extends('layouts.master')

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/cities_table.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/keywords_table.js') }}"></script>
@stop

@section('content')

@include('partials.company_heading')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<h4 class="panel-heading text-center">Add Keywords</h4>
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



				{!! Form::model($keyword, [
					'route' => ['keywords.store','keywords_plan' => $keywords_plan, 'company' => $company],
					'method' => 'POST',
					'class' => 'form-horizontal keywords-plan-form'
					]) !!}


				<table class="table table-striped keywords-table">
					<thead>
						<tr>
							<th>Keyword</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td scope="row">{!! Form::text(null, null, ['class' => 'form-control keyword-input']) !!}</td>
							<td scope="row"><a href="#" class="btn btn-primary add-keyword">Add keyword</a></td>
						</tr>
						<tr class="keyword-copy-row hidden">
							<td class="keyword"></td>
							<td class="hidden">{!! Form::text('keyword[0]', null, ['class' => 'form-control']) !!}</td>
							<td class="action"><input type="button" class="btn btn-danger remove-keyword" value="Remove"></td>
						</tr>
					</tbody>
				</table>

				<div class="col-md-12">
					{!! link_to_route("keywordsplans.show", "Back", ['id' => $keywords_plan], ['class' => 'btn btn-lg btn-primary']) !!}
					{!! Form::submit('Save Keywords', ['class' => 'btn btn-success btn-lg save-plan']); !!}
				</div>



				{!! Form::close() !!}


			</div>
		</div>
	</div>
</div>


@endsection