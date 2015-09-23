
@extends('layouts.master')

@section('content')

@if ($errors->any())
	
	<ul class="alert alert-danger login-errors col-md-4 col-md-offset-4">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

@endif


{!! Form::open(array('route' => 'users.store', 'method' => 'POST', 'class' => 'form-signin')) !!}

	<h2 class="form-signin-heading">Please sign in</h2>
	
	<div class="form-group">
		{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
	</div>
	<div class="form-group">
		{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
	</div>
	<div class="form-group">
		{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password confirmation']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Register', ['class' => 'btn btn-primary']); !!}
	</div>

{!! Form::close() !!}

@endsection