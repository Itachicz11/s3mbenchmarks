@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<h4 class="panel-heading text-center">Keywords Plan</h4>
			<div class="panel-body">

				<?php $keywords = json_decode($keywordsPlan->keywords); ?>

				<table class="table table-striped keywords-table">
					<thead>
						<tr>
							<th>Keyword</th>
							<th>City</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($keywords as $keyword => $city)
						<tr>
							<td class="keyword">{!! $keyword !!}</td>
							<td class="city">{!! $city !!}</td>
						</tr>
						@endforeach
					</tbody>
				</table>


			</div>
		</div>
	</div>
</div>
















@endsection