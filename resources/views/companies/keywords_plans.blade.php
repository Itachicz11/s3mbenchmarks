<div class="col-md-6">

	<h2>Keywords Plans</h2>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Approved</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($keywordsPlans as $keywordsPlan)
			<tr>
				<td scope="row">{!! link_to_route('keywordsplans.show', $keywordsPlan->date, array($keywordsPlan->id)) !!}</td>

				@if ($keywordsPlan->approved)
					<td scope="row">{!! link_to_route('keywordsplans.approved', 'Yes', ['id' => $keywordsPlan->id], ['class' => 'btn btn-success']) !!}</td>
				@else
					<td scope="row">{!! link_to_route('keywordsplans.approved', 'No', ['id' => $keywordsPlan->id], ['class' => 'btn btn-danger']) !!}</td>
				@endif
				<td scope="row">

				{!! Form::open(array('route' => array('keywordsplans.destroy', $keywordsPlan->id), 'method' => 'delete')) !!}
				    <button type="submit" class="btn btn-danger remove-plan" data-plan="<?php echo $keywordsPlan->id; ?>">Delete</button>
				{!! Form::close() !!}

				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
</div>
