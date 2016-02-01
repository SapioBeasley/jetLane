@extends('layouts.app')

@section('content')
<h4>View All Companies</h4>

<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Company Name</th>
					<th>Organization</th>
					<th>Primary Phone</th>
				</tr>
			</thead>
			<tbody>

				@foreach($contacts as $company)
					<tr>
						<td>{{$company['name']}}</td>
						<td>{{$company['organization']}}</td>
						<td>{{$company['phone']}}</td>
						<td><a href="{{route('contact.company.show', $company['id'])}}" class="btn btn-xs">View Company</a></td>
					</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>
@endsection
