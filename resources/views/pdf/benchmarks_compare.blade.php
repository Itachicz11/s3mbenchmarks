<html>
<head>
<link rel="stylesheet" type="text/css" href="pdf_assets/css/pdf.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

<!-- BEGIN CONTENT -->
<div class="container">

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Benchmark Preview</div>
			<div class="panel-body">

				<table class="table table-striped benchmark-table">
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

						@foreach ($keywords as $key => $keyword)

							<tr class="benchmark-row">
								<td>{!! $keyword->text !!}</td>

								@foreach ($benchmarks as $benchmark)
									<td>{!! $benchmark->page_ranks[$key]->value !!}</td>
								@endforeach

								@if ( $results[$key] >= 1 )
									<td><span class="label label-success">+{!! $results[$key] !!}</span></td>
								@elseif ( $results[$key] < 0 )
									<td><span class="label label-danger">{!! $results[$key] !!}</span></td>
								@else
									<td>{!! $results[$key] !!}</td>
								@endif
							</tr>

						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

</div>
<!-- END CONTENT --> 


</body>
</html>

