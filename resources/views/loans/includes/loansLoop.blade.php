@if(! isset($loans[0]))
	No Loans found. <a href="{{route('loans.create')}}">Add a Loan</a>
@else

	@if (isset($loans->links))
		{!!$loans->links!!}
	@endif

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Loan Title</th>
				<th>Min. Fico</th>
			</tr>
		</thead>
		<tbody>

			@foreach($loans as $loan)
				<tr>
					<td>{{$loan['loan_title']}}</td>
					<td>{{$loan['min_fico']}}</td>
					<td><a href="{{route('loans.show', $loan['id'])}}" class="btn btn-xs">View Loan</a></td>
					<td><a href="{{route('loans.duplicate', $loan['id'])}}" class="btn btn-xs">Duplicate Loan</a></td>
				</tr>
			@endforeach

		</tbody>
	</table>

@endif
