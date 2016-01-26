@extends('layouts.master')

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<div class="grid simple transparent">
				<div class="grid-title"><h3>Register <span class="semi-bold">User</span></h3></div>
				<div class="grid-body">
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


					{!! Form::open(['url' => 'auth/register', 'method' => 'POST', 'class' => 'row-fluid']) !!}

						<div class="row form-row">
							<div class="input-append primary col-md-10">								
								{!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Username']) !!}
								<span class="add-on"><span class="arrow"></span><i class="fa fa-user"></i> </span>
							</div>
						</div>

						<div class="row form-row">
							<div class="input-append primary col-md-10">								
								{!! Form::text('full_name', '', ['class' => 'form-control', 'placeholder' => 'Full Name']) !!}
								<span class="add-on"><span class="arrow"></span><i class="fa fa-user"></i> </span>
							</div>
						</div>

						<div class="row form-row">
							<div class="input-append primary col-md-10">								
								{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
								<span class="add-on"><span class="arrow"></span><i class="fa fa-envelope"></i> </span>
							</div>
						</div>
						<div class="row form-row">
							<div class="input-append primary col-md-10">
								{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
								<span class="add-on"><span class="arrow"></span><i class="fa fa-lock"></i> </span>
							</div>
						</div>
						<div class="row form-row">
							<div class="input-append primary col-md-10">
								{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password confirmation']) !!}
								<span class="add-on"><span class="arrow"></span><i class="fa fa-lock"></i> </span>
							</div>

						</div>

						{!! Form::submit('Register', ['class' => 'btn btn-primary']); !!}

					{!! Form::close() !!}


				</div>
			</div>
			
		</div>
	</div>

@endsection
