@extends('layouts.master')

@section('content')

<h2>Companies</h2>


<table class="table table-striped">
	<thead>
		<tr>
			<th>Date</th>
			<th>Compnay</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($benchmarks as $benchmark)
			<tr>
				<td scope="row">{!! $benchmark->date !!}</td>
				<td scope="row">{!! $benchmark->company->name !!}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop