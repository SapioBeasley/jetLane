@extends('layouts.app')

@section('content')
<h4>View All People</h4>

<div class="panel panel-default">
	<div class="panel-body">

		@if(empty($contacts[0]))
			No contacts found. <a href="{{route('contact.people.create')}}">Add a contact</a>
		@else
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Created By</th>
						<th>Primary Phone</th>
					</tr>
					</thead>
					<tbody>

						@foreach($contacts as $people)
							<tr>
								<td>{{$people['first_name']}}</td>
								<td>{{$people['last_name']}}</td>

								@if(\Auth::user()->email === $people['createdBy'][0]['email'])
									<td>Created by You</td>
								@else
									<td>{{$people['createdBy'][0]['email']}}</td>
								@endif

								<td>{{$people['home_phone']}}</td>
								<td><a href="{{route('contact.people.show', $people['id'])}}" class="btn btn-xs">View Person</a></td>
							</tr>
						@endforeach

				</tbody>
			</table>
		@endif

	</div>
</div>
@endsection
