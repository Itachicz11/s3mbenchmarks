
<div class="row column-seperation">
	<div class="col-md-9">
		<table class="table">
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
	</div>
	<div class="col-md-3">
		@if ($company->getApproved()->count() >= 3)
			{!! link_to_route('benchmarks.create', 'Add new', ['company' => $company->id], ['class' => 'btn btn-primary']) !!}
		@endif
	</div>
</div>


@section('scripts')
	<script type="text/javascript" src="{{ asset('js/benchmarks/destroy.js') }}"></script>
@stop