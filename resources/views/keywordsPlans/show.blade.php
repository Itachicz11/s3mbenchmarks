@extends('layouts.master')

@section('content')

{!! Breadcrumbs::render('keywordsPlan', $keywordsPlan) !!}

<div class="page-title">
<h3>Keywords Plan - <span class="semi-bold">{!! $keywordsPlan->date !!}</span></h3>
</div>

<div class="row">
	<div class="col-md-6">
		
		<div class="grid simple">
			<div class="grid-title"> <h4>Keywords</h4> </div>
			<div class="grid-body">
				
				<table class="table keywords-table">
					<tbody>
						@foreach ($keywordsPlan->keywords as $keyword)
						<tr>
							<td>{!! $keyword->text !!}</td>
							<td class="text-right">
								<div class="btn btn-danger btn-fa fa-remove no-text"></div>
								{{-- <a href="{!! route('keywords.edit', $keyword->id) !!}" class="btn btn-success btn-fa fa-edit no-text"></a> --}}
								{!! link_to_route('keywords.update', '', [$keywordsPlan, $keyword->id], ['class' => 'update-keyword btn btn-success btn-fa fa-edit no-text']) !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!! link_to_route('keywords.create', 'Add new', [$company, $keywordsPlan], ['class' => 'btn btn-primary']) !!}
				{!! link_to_route('keywordsplans.keywords.edit', 'Edit', [$company, $keywordsPlan], ['class' => 'btn btn-info']) !!}
				{!! link_to_route('keywordsplans.keywords.remove', 'Remove', [$company, $keywordsPlan], ['class' => 'btn btn-danger']) !!}

			</div>
		</div>


	</div>
	<div class="col-md-6">
		
		<div class="grid simple">
			<div class="grid-title"> <h4>Cities</h4> </div>
			<div class="grid-body">
				
				@if ( $keywordsPlan->citites )
					<table class="table table-striped keywords-table">
						<tbody>
							@foreach ($keywordsPlan->cities as $city)
							<tr>
								<td>{!! $city->name !!}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<h4 class="semi-bold">No cities added</h4>
					<br>
				@endif

				{!! link_to_route('keywordsplans.cities.add', 'Add new', ['keywordsplan' => $keywordsPlan, 'company' => $company], ['class' => 'btn btn-primary']) !!}
				{!! link_to_route('keywordsplans.cities.edit', 'Edit', [$company, $keywordsPlan], ['class' => 'btn btn-info']) !!}
				{!! link_to_route('keywordsplans.cities.remove', 'Remove', [$company, $keywordsPlan], ['class' => 'btn btn-danger']) !!}

			</div>
		</div>

	</div>
</div>


{!! Form::open([null, 'method' => 'PUT', 'class' => 'update-keyword-form']) !!}

	<div class="admin-bar" id="keyword-update-bar">
		<div class="admin-bar-inner">
			<div class="form-horizontal">
				{!! Form::text('keyword', '', ['class' => 'form-control', 'placeholder' => 'keyword']) !!}
			</div>
			{!! Form::submit('Update', ['class' => 'btn btn-success btn-cons']) !!}
			<button class="btn btn-white btn-cons btn-cancel" type="button">Cancel</button>
		</div>
	</div>

{!! Form::close() !!}

@endsection