@extends('layouts.master')

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/cities_table.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/keywords_table.js') }}"></script>
@stop

@section('content')

@include('partials.company_heading')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<h4 class="panel-heading text-center">Keywords Plan</h4>
			<div class="panel-body">
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<table class="table table-striped keywords-table">
					<thead>
						<tr>
							<th>Keyword</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0 ?>
						@foreach ($keywordsPlan->keywords as $keyword)
							{!! Form::model($keyword, ['route' => ['keywords.update', $keywordsPlan, $keyword], 'method' => 'PUT']) !!}
							<tr>
								<td>
									{!! Form::text('keyword', $keyword->text, ['class' => 'form-control ']) !!}
								</td>
								<td>
									{!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
								</td>
							</tr>
							{!! Form::close() !!}
							<?php $i++ ?>
						@endforeach
					</tbody>
				</table>

				{!! link_to_route("keywordsplans.show", "Back", [$company, $keywordsPlan], ['class' => 'btn btn-primary']) !!}



			</div>
		</div>
	</div>
</div>



@endsection