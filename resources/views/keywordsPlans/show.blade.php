@extends('layouts.master')

@section('content')

@include('partials.company_heading')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<h4 class="panel-heading text-center">Keywords Plan - {!! $keywordsPlan->date !!}</h4>
			<div class="panel-body">


				<div class="row">
					<div class="col-md-6">
						<table class="table table-striped keywords-table">
							<thead>
								<th>Keywords</th>
							</thead>
							<tbody>
								@foreach ($keywordsPlan->keywords as $keyword)
								<tr>
									<td>{!! $keyword->text !!}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! link_to_route('keywords.create', 'Add new', [$company, $keywordsPlan], ['class' => 'btn btn-primary']) !!}
						{!! link_to_route('keywordsplans.keywords.edit', 'Edit', [$company, $keywordsPlan], ['class' => 'btn btn-info']) !!}
						{!! link_to_route('keywordsplans.keywords.remove', 'Remove', [$company, $keywordsPlan], ['class' => 'btn btn-danger']) !!}
					</div>

					<div class="col-md-6">
						<table class="table table-striped keywords-table">
							<thead>
								<th>Cities</th>
							</thead>
							<tbody>
								@foreach ($keywordsPlan->cities as $city)
								<tr>
									<td>{!! $city->name !!}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! link_to_route('keywordsplans.cities.add', 'Add new', ['keywordsplan' => $keywordsPlan, 'company' => $company], ['class' => 'btn btn-primary']) !!}
						{!! link_to_route('keywordsplans.cities.edit', 'Edit', [$company, $keywordsPlan], ['class' => 'btn btn-info']) !!}
						{!! link_to_route('keywordsplans.cities.remove', 'Remove', [$company, $keywordsPlan], ['class' => 'btn btn-danger']) !!}
					</div>
				</div>


			</div>
		</div>
	</div>
</div>





@endsection