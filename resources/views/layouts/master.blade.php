<!-- Stored in app/views/layouts/master.blade.php -->

<html>
<head>

<link rel="stylesheet" href="{!! asset('admin-skin/plugins/font-awesome/css/font-awesome.css') !!}">
<link rel="stylesheet" href="{!! asset('admin-skin/css/dist/admin.css') !!}">
<link rel="stylesheet" href="{!! asset('css/app.css') !!}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
@yield('styles')

</head>
<body>

@include('layouts.header')

<!-- BEGIN CONTENT -->
<div class="page-container row-fluid">

	@include('layouts.sidebar')

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content"> 
        <div class="content">  
            <!-- BEGIN PlACE PAGE CONTENT HERE -->

            @yield('content')

            <!-- END PLACE PAGE CONTENT HERE -->
        </div>
    </div>
    <!-- END PAGE CONTAINER -->
</div>
<!-- END CONTENT --> 


<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
@yield('scripts')

<script src="{!! asset('admin-skin/plugins/jquery-1.8.3.min.js') !!}" type="text/javascript"></script> 
<script src="{!! asset('admin-skin/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') !!}" type="text/javascript"></script> 
<script src="{!! asset('admin-skin/plugins/boostrapv3/js/bootstrap.min.js') !!}" type="text/javascript"></script> 
<script src="{!! asset('admin-skin/plugins/breakpoints.js') !!}" type="text/javascript"></script> 
<script src="{!! asset('admin-skin/plugins/jquery-unveil/jquery.unveil.min.js') !!}" type="text/javascript"></script> 
<script src="{!! asset('admin-skin/plugins/jquery-block-ui/jqueryblockui.js') !!}" type="text/javascript"></script> 
<script src="{!! asset('admin-skin/plugins/jquery-validation/js/jquery.validate.min.js') !!}" type="text/javascript"></script> 
<script src="{!! asset('admin-skin/plugins/bootstrap-select2/select2.min.js') !!}" type="text/javascript"></script> 
<script src="{!! asset('admin-skin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}" type="text/javascript"></script> 
<script src="{!! asset('admin-skin/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') !!}" type="text/javascript"></script> 
<!-- END CORE JS FRAMEWORK --> 
<!-- BEGIN PAGE LEVEL JS -->    
<script src="{!! asset('admin-skin/plugins/jquery-scrollbar/jquery.scrollbar.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('admin-skin/plugins/pace/pace.min.js') !!}" type="text/javascript"></script>  
<script src="{!! asset('admin-skin/plugins/jquery-numberAnimate/jquery.animateNumbers.js') !!}" type="text/javascript"></script>
<script src="{!! asset('admin-skin/plugins/dropzone/dropzone.min.js') !!}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->     

<!-- BEGIN CORE TEMPLATE JS --> 
<script src="{!! asset('admin-skin/js/core.js') !!}" type="text/javascript"></script> 
{{-- <script src="{!! asset('admin-skin/js/demo.js') !!}" type="text/javascript"></script>  --}}
<script src="{!! asset('admin-skin/js/tabs_accordian.js') !!}" type="text/javascript"></script> 
<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script> 
<script src="//benchmarks.app:35729/livereload.js"></script>

</body>
</html>