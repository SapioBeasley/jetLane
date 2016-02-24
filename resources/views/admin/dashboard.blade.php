@extends('layouts.app')

@section('content')

<div class="page-header">
	<h5>User Roles</h5>
</div>

@foreach ($users as $userKey => $user)
	<div class="panel panel-default">
		<div class="panel-body">

			<div class="col-md-4">
				{{$user['name']}}
			</div>

			{!! Form::model($user['roles'][0], ['route' => 'admin.update.roles', 'method' => 'PUT']) !!}

				{!! Form::hidden('user_id', $user['id']) !!}

				@if ($user['roles'][0]['role'] == 'admin')
					<label class="col-md-2">
						{!! Form::checkbox('role', '1', true) !!} Admin
					</label>
				@else
					<label class="col-md-2">
						{!! Form::checkbox('role', '1', false) !!} Admin
					</label>
				@endif

				@if ($user['roles'][0]['role'] == 'agent')
					<label class="col-md-2">
						{!! Form::checkbox('role', '2', true) !!} Agent
					</label>
				@else
					<label class="col-md-2">
						{!! Form::checkbox('role', '2', false) !!} Agent
					</label>
				@endif

				@if ($user['roles'][0]['role'] == 'lender')
					<label class="col-md-2">
						{!! Form::checkbox('role', '3', true) !!} Lender
					</label>
				@else
					<label class="col-md-2">
						{!! Form::checkbox('role', '3', false) !!} Lender
					</label>
				@endif

				<div class="col-md-2">
					{!!Form::submit('Save Role', ['class' => 'btn btn-primary'])!!}
				</div>

			{!! Form::close() !!}

		</div>
	</div>
	<hr>
@endforeach

@endsection
