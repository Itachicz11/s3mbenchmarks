@extends('layouts.master')

@section('content')

<h2>{!! $company->name !!}</h2>

@if ($company->getApproved()->count() >= 3)
	{!! link_to_route('benchmarks.create', 'New Benchmark', ['company' => $company->id], ['class' => 'btn btn-primary']) !!}
@endif
{!! link_to_route('keywordsplans.create', 'New Keywords Plan', ['company' => $company->id], ['class' => 'btn btn-primary']) !!}


<div class="row">
	<div class="col-md-6">

		<h2>Keywords Plans</h2>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Approved</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($keywordsPlans as $keywordsPlan)
				<tr>
					<td scope="row">{!! link_to_route('keywordsplans.show', $keywordsPlan->date, array($keywordsPlan->id)) !!}</td>

					@if ($keywordsPlan->approved)
						<td scope="row">{!! link_to_route('keywordsplans.approved', 'Yes', ['id' => $keywordsPlan->id], ['class' => 'btn btn-success']) !!}</td>
					@else
						<td scope="row">{!! link_to_route('keywordsplans.approved', 'No', ['id' => $keywordsPlan->id], ['class' => 'btn btn-danger']) !!}</td>
					@endif
					<td scope="row">

					{!! Form::open(array('route' => array('keywordsplans.destroy', $keywordsPlan->id), 'method' => 'delete')) !!}
						{!! link_to_route('keywordsplans.edit', 'Edit', ['keywordsplans' => $keywordsPlan->id, 'company' => $company->id], ['class' => 'btn btn-primary']) !!}
					    <button type="submit" class="btn btn-danger remove-plan" data-plan="<?php echo $keywordsPlan->id; ?>">Delete</button>
					{!! Form::close() !!}

					</td>

				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="col-md-6">

		<h2>Benchmarks</h2>

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

					{!! Form::open(array('route' => array('benchmarks.destroy', $benchmark->id), 'method' => 'delete')) !!}
						{!! link_to_route('benchmarks.edit', 'Edit', ['benchmarks' => $benchmark->id, 'company' => $company->id], ['class' => 'btn btn-primary']) !!}
					    <button type="submit" class="btn btn-danger remove-benchmark" data-benchmark="<?php echo $benchmark->id; ?>">Delete</button>
					{!! Form::close() !!}

					</td>
					<td>
						{!! Form::checkbox('compare', $benchmark->id) !!}
				</tr>
				@endforeach


			</tbody>
		</table>

		{!! Form::open(array('route' => array('benchmarks.compare'), 'method' => 'post')) !!}
		    {!! Form::input('text', 'benchmarks_arr', null, ['class' => 'benchmarks-arr']) !!}
		    {!! Form::input("submit", 'Compare',  null, ['class' => 'btn btn-primary', 'id' => 'compare-benchmarks']) !!}
		{!! Form::close() !!}
		
	</div>
</div>


@endsection


