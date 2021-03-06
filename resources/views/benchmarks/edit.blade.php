
@extends('layouts.master')

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/benchmark_table.js') }}"></script>
@stop

@section('content')


<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Create Benchmark</div>
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

				{!! Form::model($benchmark, ['route' => ['benchmarks.update', 'id' => $benchmark->id, 'company' => $company], 'method' => 'PATCH', 'class' => 'form-horizontal benchmark-form']) !!}

					<div class="row">						
						<div class="col-md-4">
							{!! Form::date('date', null, ['class' => 'form-control']) !!}
						</div>
						<div class="col-md-4">
							{!! Form::submit('Update Benchmark', ['class' => 'btn btn-success save-benchmark']); !!}
						</div>
					</div>

					<table class="table table-striped benchmark-table">
						<thead>
							<tr>
								<th>Keyword</th>
								<th>Page Rank</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($page_ranks as $page_rank)
								<tr class="benchmark-row">
									<td>{!! $page_rank->keyword->text !!}</td>
									<td>{!! Form::number('page_rank['.$page_rank->id.']', $page_rank->value, ['class' => 'form-control page-rank-input']) !!}</td>
								</tr>
							@endforeach
							<tr class="copy-row hidden">
								<td class="keyword"></td>
								<td class="page-rank"></td>
								<td class="action"><input type="button" class="btn btn-danger remove-keyword" value="Remove"></td>
							</tr>
						</tbody>
					</table>

				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>


@endsection