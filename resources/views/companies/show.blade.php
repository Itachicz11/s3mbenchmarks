@extends('layouts.master')

@section('content')

<div class="page-title"> 
    <h3>{!! Str::title($company->name) !!}</h3>  
</div>

@if ($errors->any())
    
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

@endif

<ul class="nav nav-tabs" id="companies-tabs">
    <li class="active"><a href="#keywords_plans_tab"><strong>Keywords Plans</strong></a></li>
    <li><a href="#benchmarks_tab"><strong>Benchmarks</strong></a></li>
    <li><a href="#compare_tab"><strong>Compare benchmarks</strong></a></li>
</ul>


<div class="tab-content">
    <div class="tab-pane active" id="keywords_plans_tab">
        @include('companies.keywords_plans')
    </div>
    <div class="tab-pane" id="benchmarks_tab">
    	@include('companies.benchmarks_list')
    </div>
    <div class="tab-pane" id="compare_tab">

    {!! Form::open(['route' => ['benchmarks.compare', 'company' => $company], 'method' => 'post']) !!}

        <div class="row">
            <div class="col-md-6">        
                <div class="form-group">        
                    {!! Form::label('first_compare', 'First Benchmark') !!}
                    <select name="first_compare" id="first_compare" class="select2 form-control">
                        @foreach ($benchmarks as $benchmark)
                            <option value="{!! $benchmark->id !!}">{!! $benchmark->date !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">        
                <div class="form-group">    
                    {!! Form::label('first_compare', 'Second Benchmark') !!}
                    <select name="second_compare" id="second_compare" class="select2 form-control">
                        @foreach ($benchmarks as $benchmark)
                            <option value="{!! $benchmark->id !!}">{!! $benchmark->date !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Compare', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    </div>
</div>


{{-- 	            <div class="col-md-12">

	            	<h3>How much companies belongs to users</h3>

	            	<div id="chart_div"></div>
	            </div> --}}




@endsection

