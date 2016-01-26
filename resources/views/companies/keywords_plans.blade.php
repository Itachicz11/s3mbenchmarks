
<div class="row column-seperation">
	<div class="col-md-9">
		<table class="table">
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
					<td class="v-align-middle">{!! link_to_route('keywordsplans.show', $keywordsPlan->date, [$company, $keywordsPlan->id]) !!}</td>


					@if (Auth::user()->can_use(1))
						@if ($keywordsPlan->approved)
							<td class="v-align-middle">{!! link_to_route('keywordsplans.approved', 'Yes', [$keywordsPlan->id], ['class' => 'btn btn-success']) !!}</td>
						@else
							<td class="v-align-middle">{!! link_to_route('keywordsplans.approved', 'No', [$keywordsPlan->id], ['class' => 'btn btn-danger']) !!}</td>
						@endif
					@endif

					<td class="v-align-middle">

					{!! Form::open(array('route' => array('keywordsplans.destroy', $keywordsPlan->id), 'method' => 'DELETE')) !!}
					    <button type="submit" class="btn btn-danger remove-plan" data-plan="<?php echo $keywordsPlan->id; ?>">Delete</button>
					{!! Form::close() !!}

					</td>

				</tr>
				@endforeach
			</tbody>
		</table>		
	</div>
	<div class="col-md-3">
		{!! link_to_route('keywordsplans.create', 'Add new', [$company->id], ['class' => 'btn btn-primary']) !!}
	</div>
</div>
