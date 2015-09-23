@extends('layouts.master')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
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


					{!! Form::open(array('url' => 'auth/register', 'method' => 'POST', 'class' => 'form-horizontal')) !!}

						<div class="form-group">
							{!! Form::label('Email', null, ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('Password', null, ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('Password confirmation', null, ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password confirmation']) !!}
							</div>

						</div>

						<div class="col-md-6 col-md-offset-4">
							{!! Form::submit('Register', ['class' => 'btn btn-primary']); !!}
						</div>

					{!! Form::close() !!}


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
