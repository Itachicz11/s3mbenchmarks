@extends('layouts.master')

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/cities_table.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/keywords_table.js') }}"></script>
@stop

@section('content')

@include('partials.company_heading')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="grid simple">
			<h4 class="grid-heading">Add Keywords</h4>
			<div class="grid-body">
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

					

					<div class="col-md-12">

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

				<div class="col-md-12">
					{!! link_to_route("keywordsplans.show", "Back", [$company, $keywords_plan], ['class' => 'btn btn-primary']) !!}
					{!! Form::submit('Save Keywords', ['class' => 'btn btn-success save-plan']); !!}
				</div>



				{!! Form::close() !!}


			</div>
		</div>
	</div>
</div>


@endsection