<!-- Stored in app/views/layouts/master.blade.php -->

<html>
<head>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
@yield('styles')


</head>
<body>

	<div class="main-menu">
		<div class="container">
			<ul>
				<li>{!! link_to_route('companies.index', 'Companies', '') !!}</li>
			</ul>
		</div>
	</div>

	<div class="container">
		@yield('content')
	</div>


	<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	@yield('scripts')
</body>
</html>