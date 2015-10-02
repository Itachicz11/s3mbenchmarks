@extends('layouts.master')

@section('content')

{!! link_to_route('companies.create', 'Add Company', null, ['class' => 'btn btn-primary']) !!}

<h2>Companies</h2>

<table class="table table-striped">
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

@stop