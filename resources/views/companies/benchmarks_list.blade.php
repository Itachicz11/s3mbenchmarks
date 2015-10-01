<div class="col-md-6">

	<h2>Benchmarks</h2>


	@if ($errors->any())
		
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>

	@endif

	{!! Form::open(array('route' => ['benchmarks.compare', 'company' => $company], 'method' => 'post')) !!}

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Compnay</th>
				<th>Action</th>
				<th>Compare</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($benchmarks as $benchmark)
			<tr>
				<td scope="row">{!! link_to_route('benchmarks.show', $benchmark->date, [$benchmark->id]) !!}</td>
				<td scope="row">{!! $benchmark->company->name !!}</td>

				<td scope="row">

		
				{!! link_to_route('benchmarks.edit', 'Edit', ['benchmarks' => $benchmark->id, 'company' => $company->id], ['class' => 'btn btn-primary']) !!}
				{!! link_to_route('benchmarks.destroy', 'Delete', ['benchmarks' => $benchmark->id], ['class' => 'btn btn-danger delete-benchmark']) !!}

				</td>
				<td>
					{!! Form::checkbox('compare[]', $benchmark->id) !!}
			</tr>
			@endforeach


		</tbody>
	</table>
	{!! Form::submit("Compare Benchmarks", ['class' => 'btn btn-primary', 'id' => 'compare-benchmarks']) !!}
	{!! Form::close() !!}

</div>


@section('scripts')
	<script type="text/javascript" src="{{ asset('js/benchmarks/destroy.js') }}"></script>
@stop