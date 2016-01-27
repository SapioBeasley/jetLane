@extends('layouts.app')

@section('content')
<h4>Add New People</h4>

<div class="panel panel-default">
	<div class="panel-body">

		{!! Form::open(['route' => 'contact.people.store', 'files' => true]) !!}

			@include('contact.people.includes.informationForm')

			<div class="col-md-12">
				<div class="form-group">
					{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
				</div>
			</div>

		{!! Form::close() !!}

	</div>
</div>
@endsection
