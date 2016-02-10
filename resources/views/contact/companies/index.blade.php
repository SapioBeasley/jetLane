@extends('layouts.app')

@section('content')
<h4>View All Companies</h4>

<div class="panel panel-default">
	<div class="panel-body">

		@if(empty($contacts[0]))
			No contacts found. <a href="{{route('contact.company.create')}}">Add a contact</a>
		@else
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

					@foreach($contacts as $company)
						<tr>
							<td>{{$company['name']}}</td>
							<td>{{$company['organization']}}</td>

							@if(\Auth::user()->email === $company['createdBy'][0]['email'])
								<td>Created by You</td>
							@else
								<td>{{$company['createdBy'][0]['email']}}</td>
							@endif

							<td>{{$company['phone']}}</td>
							<td><a href="{{route('contact.company.show', $company['id'])}}" class="btn btn-xs">View Company</a></td>
						</tr>
					@endforeach

				</tbody>
			</table>
		@endif
	</div>
</div>
@endsection
