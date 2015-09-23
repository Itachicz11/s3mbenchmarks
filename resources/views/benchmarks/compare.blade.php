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



				<table class="table table-striped benchmark-table">
					<thead>
						<tr>
							<th>Keyword</th>
							<th>city</th>
							@foreach ($benchmarks as $benchmark)
							<th>{!! $benchmark->date !!}</th>
							@endforeach
							<th>Difference</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0; ?>
						@foreach ($keywords as $keyword => $city)
							<tr class="benchmark-row">
								<td>{!! $keyword !!}</td>
								<td>{!! $city !!}</td>
								@foreach ($benchmarks as $benchmark)
									<td>{!! $benchmark->data[$i] !!}</td>
								@endforeach
								<td>{!! $compared[$i] !!}</td>
							</tr>
							<?php $i++; ?>
						@endforeach
						<tr class="copy-row hidden">
							<td class="keyword"></td>
							<td class="page-rank"></td>
							<td class="action"><input type="button" class="btn btn-danger remove-keyword" value="Remove"></td>
						</tr>
					</tbody>
				</table>




			</div>
		</div>
	</div>
</div>

@endsection

@stop