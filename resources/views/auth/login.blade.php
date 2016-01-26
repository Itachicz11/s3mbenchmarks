@extends('layouts.login')

@section('content')

<div class="col-md-5 col-md-offset-1">
	<h2>Sign in to <span class="semi-bold">S3M</span></h2>
	<p class="joke-wrapp"></p>
</div>

<div class="col-md-5 ">
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>You entered invalid information</strong> </br></br>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	{!! Form::open([ 'url' => '/auth/login', 'method' => 'POST', 'novalidate' => 'novalidate', 'class' => 'login-form', 'id' => 'login-form' ]) !!}

		<div class="row">
			<div class="form-group col-md-10">
				{!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
				<div class="controls">
					<div class="input-with-icon  right">                                       
						<i class=""></i>
						{!! Form::text('email', '', ['class' => 'form-control']) !!}
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-10">
				{!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
				<div class="controls">
					<div class="input-with-icon right">                                       
						<i class=""></i>
						{!! Form::password('password', ['class' => 'form-control']) !!}
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="control-group  col-md-10">
				<div class="checkbox checkbox check-success">
					{!! Form::checkbox('remember') !!}
					<label for="remember">Keep me reminded </label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10">
				{!! Form::submit('Login', ['class' => 'btn btn-primary btn-cons pull-right']) !!}
			</div>
		</div>

	{!! Form::close() !!}




@endsection