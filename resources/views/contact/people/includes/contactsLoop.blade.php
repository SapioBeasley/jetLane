@if($contacts['private'] == null)
	No contacts found. <a href="{{route('contact.people.create')}}">Add a contact</a>
@else

	<div class="page-header">
		<h6><string>Your Private Contacts</string></h6>
	</div>

	{!!$contacts['links']!!}

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

			@foreach($contacts['private'] as $people)
				<tr>
					<td>{{$people['first_name']}}</td>
					<td>{{$people['last_name']}}</td>

					@if(\Auth::user()->email === $people['created_by'])
						<td>Created by You</td>
					@else
						<td>{{$people['created_by']}}</td>
					@endif

					<td>{{$people['home_phone']}}</td>
					<td><a href="{{route('contact.people.show', $people['id'])}}" class="btn btn-xs">View Person</a></td>
				</tr>
			@endforeach

		</tbody>
	</table>

@endif

@if ($contacts['shared'] != null)

	<div class="page-header">
		<h6><string>Your Shared Contacts</string></h6>
	</div>

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

			@foreach($contacts['shared'] as $people)
				<tr>
					<td>{{$people['first_name']}}</td>
					<td>{{$people['last_name']}}</td>

					@if(\Auth::user()->email === $people['created_by'])
						<td>Created by You</td>
					@else
						<td>{{$people['created_by']}}</td>
					@endif

					<td>{{$people['home_phone']}}</td>
					<td><a href="{{route('contact.people.show', $people['id'])}}" class="btn btn-xs">View Person</a></td>
				</tr>
			@endforeach

		</tbody>
	</table>

@endif
