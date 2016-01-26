@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-9 col-md-offset-1">

		<div class="grid simple">
			<div class="grid-title"><h4>Benchmark Preview</h4></div>
			<div class="grid-body">

				<table class="table benchmark-table">
					<thead>
						<tr>
							<th>Keyword</th>
							@foreach ($benchmarks as $benchmark)
								<th>{!! $benchmark->date !!}</th>
							@endforeach
							<th>Difference</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0; ?>
						@foreach ($keywords as $key => $keyword)

							<tr class="benchmark-row">
								<td>{!! $keyword->text !!}</td>
								<td>{!! $benchmarks[0]->page_ranks[$key]->value !!}</td>
								<td>{!! $benchmarks[1]->page_ranks[$key]->value !!}</td>


								@if ( $results[$key] >= 1 )
									<td><span class="label label-success">+{!! $results[$key] !!}</span></td>
								@elseif ( $results[$key] < 0 )
									<td><span class="label label-danger">{!! $results[$key] !!}</span></td>
								@else
									<td>{!! $results[$key] !!}</td>
								@endif
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

				{!! Form::open(['route' => ['benchmarks.pdf', $benchmarks[0], $benchmarks[1]], 'method' => 'POST', 'id' => 'pdf-form']) !!}
					{!! link_to_route('companies.show', 'Back', ['company' => $benchmarks[0]->company], ['class' => 'btn btn-primary']) !!}
					{!! Form::submit('Get PDF', ['class' => 'btn btn-success']) !!}
				{!! Form::close() !!}


			</div>
		</div>
	</div>
</div>
@endsection

