<!-- Stored in app/views/layouts/master.blade.php -->

<html>
<head>

<link rel="stylesheet" href="{!! asset('admin-skin/plugins/font-awesome/css/font-awesome.css') !!}">
<link rel="stylesheet" href="{!! asset('admin-skin/css/dist/admin.css') !!}">
<link rel="stylesheet" href="{!! asset('css/app.css') !!}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

@yield('styles')

</head>
<body class="error-body">

<!-- BEGIN CONTENT -->
<div class="container">

    <!-- BEGIN PAGE CONTAINER-->
    <div class="row login-container column-seperation"> 
            @yield('content')
    </div>
    <!-- END PAGE CONTAINER -->
</div>
<!-- END CONTENT --> 


@yield('scripts')
<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jokes.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>

</body>
</html>