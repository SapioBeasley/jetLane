@extends('layouts.app')

@section('content')
<h4>View All People</h4>

<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Primary Phone</th>
				</tr>
				</thead>
				<tbody>

					@foreach($contacts as $people)
						<tr>
							<td>{{$people['first_name']}}</td>
							<td>{{$people['last_name']}}</td>
							<td>{{$people['home_phone']}}</td>
							<td><a href="{{route('contact.people.show', $people['id'])}}" class="btn btn-xs">View Person</a></td>
						</tr>
					@endforeach

			</tbody>
		</table>
	</div>
</div>
@endsection
