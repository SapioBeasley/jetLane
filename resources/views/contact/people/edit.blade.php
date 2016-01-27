@extends('layouts.app')

@section('content')
<h4>Edit Person</h4>

<div class="panel panel-default">
	<div class="panel-body">

		{!! Form::model($contact, ['route' => ['contact.people.update', $contact['id']], 'method' => 'PUT']) !!}

			@include('contact.people.includes.informationForm')

			<div class="col-md-12">
				<div class="form-group">
					{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
				</div>
			</div>

		{!! Form::close() !!}

	</div>
</div>
@endsection
