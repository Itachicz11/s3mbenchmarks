<div class="col-md-6">

	<h2>Keywords Plans</h2>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Date</th>

				@if (Auth::user()->can_use(1))
					<th>Approved</th>
				@endif

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($keywordsPlans as $keywordsPlan)
			<tr>
				<td scope="row">{!! link_to_route('keywordsplans.show', $keywordsPlan->date, [$company, $keywordsPlan->id]) !!}</td>


				@if (Auth::user()->can_use(1))
					@if ($keywordsPlan->approved)
						<td scope="row">{!! link_to_route('keywordsplans.approved', 'Yes', [$keywordsPlan->id], ['class' => 'btn btn-success']) !!}</td>
					@else
						<td scope="row">{!! link_to_route('keywordsplans.approved', 'No', [$keywordsPlan->id], ['class' => 'btn btn-danger']) !!}</td>
					@endif
				@endif

				<td scope="row">

				{!! Form::open(array('route' => array('keywordsplans.destroy', $keywordsPlan->id), 'method' => 'DELETE')) !!}
				    <button type="submit" class="btn btn-danger remove-plan" data-plan="<?php echo $keywordsPlan->id; ?>">Delete</button>
				{!! Form::close() !!}

				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
</div>
