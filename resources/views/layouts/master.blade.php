<!-- Stored in app/views/layouts/master.blade.php -->

<html>
<head>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
@yield('styles')


</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">S3Benchmarks</a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	          	<li>{!! link_to_route('companies.index', 'Companies', '') !!}</li>
	          	<li>{!! link_to('/auth//logout', 'Logout') !!}</li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

	<div class="container">
		@yield('content')
	</div>

	<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	@yield('scripts')
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>