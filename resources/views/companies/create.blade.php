
@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Create company</div>
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


				{!! Form::open(array('route' => 'companies.store', 'method' => 'POST', 'class' => 'form-horizontal')) !!}

					<div class="form-group">
						{!! Form::label('Name', null, ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('URL', null, ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'URL']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('Email', null, ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
						</div>
					</div>


					<div class="col-md-6 col-md-offset-4">
						{!! Form::submit('Create company', ['class' => 'btn btn-primary']); !!}
					</div>

				{!! Form::close() !!}


			</div>
		</div>
	</div>
</div>
















@endsection