@extends('layouts.master')

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/benchmark_table.js') }}"></script>
@stop

@section('content')


<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Benchmark Preview</div>
			<div class="panel-body">

				{!! Form::model($benchmark, ['route' => ['benchmarks.update'], 'method' => 'PATCH', 'class' => 'form-horizontal benchmark-form']) !!}

					<h3>{!! $benchmark->date !!}</h3>

					<table class="table table-striped benchmark-table">
						<thead>
							<tr>
								<th>Keyword</th>
								<th>Page Rank</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($page_ranks as $page_rank)
							<tr>
								<td>{!! $page_rank->keyword->text !!}</td>
								<td>{!! $page_rank->value !!}</td>
							</tr>
						@endforeach
						</tbody>
					</table>

				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>

@endsection

@stop