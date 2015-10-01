@extends('layouts.master')

@section('content')

@include('partials.company_heading')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<h4 class="panel-heading text-center">Keywords Plan - {!! $keywordsPlan->date !!}</h4>
			<div class="panel-body">


				<table class="table table-striped keywords-table">
					<tbody>
						@foreach ($keywordsPlan->keywords as $keyword)
						<tr>
							<td>{!! $keyword->text !!}</td>
						</tr>
						@endforeach
					</tbody>
				</table>


				<div class="text-center">				
					{!! link_to_route('keywords.create', 'Add Keywords', ['keywordsplan' => $keywordsPlan, 'company' => $company], ['class' => 'btn btn-lg btn-primary']) !!}
					{!! link_to_route('keywordsplans.edit', 'Edit Keywords', ['keywordsplan' => $keywordsPlan], ['class' => 'btn btn-lg btn-info']) !!}
				</div>


			</div>
		</div>
	</div>
</div>
















@endsection