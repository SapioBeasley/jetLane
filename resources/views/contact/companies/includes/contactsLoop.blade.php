@if($contacts['private'] == null)
	No contacts found. <a href="{{route('contact.company.create')}}">Add a contact</a>
@else

	<div class="page-header">
		<h6><string>Your Private Contacts</string></h6>
	</div>

	{!!$contacts['links']!!}

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Company Name</th>
				<th>Organization</th>
				<th>Created By</th>
				<th>Primary Phone</th>
			</tr>
		</thead>
		<tbody>

			@foreach($contacts['private'] as $company)
				<tr>
					<td>{{$company['name']}}</td>
					<td>{{$company['organization']}}</td>

					@if(\Auth::user()->email === $company['created_by'])
						<td>Created by You</td>
					@else
						<td>{{$company['created_by']}}</td>
					@endif

					<td>{{$company['phone']}}</td>
					<td><a href="{{route('contact.company.show', $company['id'])}}" class="btn btn-xs">View Company</a></td>
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
				<th>Company Name</th>
				<th>Organization</th>
				<th>Created By</th>
				<th>Primary Phone</th>
			</tr>
		</thead>
		<tbody>

			@foreach($contacts['shared'] as $company)
				<tr>
					<td>{{$company['name']}}</td>
					<td>{{$company['organization']}}</td>

					@if(\Auth::user()->email === $company['created_by'])
						<td>Created by You</td>
					@else
						<td>{{$company['created_by']}}</td>
					@endif

					<td>{{$company['phone']}}</td>
					<td><a href="{{route('contact.company.show', $company['id'])}}" class="btn btn-xs">View Company</a></td>
				</tr>
			@endforeach

		</tbody>
	</table>

@endif
