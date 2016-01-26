@extends('layouts.master')

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/cities_table.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/keywords_table.js') }}"></script>
@stop

@section('content')

{{-- @include('partials.company_heading') --}}

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

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h3>Add <span class="semi-bold">Keywords</span></h3>
				<p>Add another keywords to your keywords plan.</p>
			</div>
			<div class="grid-body no-border">

				{!! Form::model($keyword, [
					'route' => ['keywords.store','keywords_plan' => $keywords_plan, 'company' => $company],
					'method' => 'POST',
					'class' => 'keywords-plan-form'
					]) !!}

					<div class="row column-seperation form-group">
						<div class="col-md-12">

							<div class="row form-row">
								<div class="col-md-8">
									{!! Form::text(null, null, ['class' => 'form-control keyword-input', 'placeholder' => 'keyword']) !!}
								</div>
								<div class="col-md-4">
									<a href="javascript:;" class="btn btn-primary btn-cons add-keyword">Add keyword</a>
								</div>
							</div>

							<div class="keyword-list">							
								<div class="keyword-copy-row clearfix hidden">
									<div class="part">{!! Form::text(null, null, ['class' => 'form-control keyword']) !!}</div>
									<div class="part"><input type="button" class="btn btn-danger remove-keyword" value="Remove"></div>
								</div>
							</div>

						</div>
					</div>



					<div class="form-group">
						{!! Form::submit('Save Keywords', ['class' => 'btn btn-success save-plan']); !!}
					</div>



				{!! Form::close() !!}


			</div>
		</div>
	</div>
</div>


@endsection