@extends('layouts.master')

@section('content')

<h2>{!! $company->name !!}</h2>

@if ($company->getApproved()->count() >= 3)
	{!! link_to_route('benchmarks.create', 'New Benchmark', ['company' => $company->id], ['class' => 'btn btn-primary']) !!}
@endif
{!! link_to_route('keywordsplans.create', 'New Keywords Plan', [$company->id], ['class' => 'btn btn-primary']) !!}


<div class="row">

	@include('companies.keywords_plans')

	@include('companies.benchmarks_list')

	<div class="col-md-12">

		<h3>How much companies belongs to users</h3>

		<div id="chart_div"></div>
	</div>

</div>

@endsection

