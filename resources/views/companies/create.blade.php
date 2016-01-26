
@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">


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

		<div class="grid simple">
			<div class="grid-title no-border"><h4>Create company</h4></div>
			<div class="grid-body no-border">


				{!! Form::open(array('route' => 'companies.store', 'method' => 'POST', 'class' => '')) !!}

					<div class="form-group">
						{!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
						<div class="controls">
							{!! Form::text('name', '', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('url', 'URL', ['class' => 'form-label']) !!}
						<div class="controls">
							{!! Form::text('url', '', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
						<div class="controls">
							{!! Form::text('email', '', ['class' => 'form-control']) !!}
						</div>
					</div>
			
					<div class="form-group">
						{!! Form::submit('Create copmany', ['class' => 'btn btn-primary']) !!}
					</div>

				{!! Form::close() !!}
				
			</div>
		</div>

	</div>
</div>

@endsection