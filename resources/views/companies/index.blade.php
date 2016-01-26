@extends('layouts.master')

@section('content')

<div class="grid simple">
	<div class="grid-title"><h4>Companies</h4></div>
	<div class="grid-body">

		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>URL</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($companies as $company)
					<tr>
						<td scope="row">{!! link_to_route('companies.show', $company->name, [$company] ) !!}</td>
						<td><a href="{!! $company->url !!}" target="_blank">{!! $company->url !!}</a></td>
						<td><a href="mailto:{!! $company->email !!}">{!! $company->email !!}</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
</div>

@stop