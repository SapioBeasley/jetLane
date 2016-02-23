@extends('layouts.app')

@section('content')
<h4>Add New Loan</h4>

<div class="panel panel-default">
	<div class="panel-body">

		{!! Form::open(['route' => 'loans.store']) !!}

			@include('loans.includes.informationForm')

			<div class="col-md-12">
				<div class="form-group">
					{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
				</div>
			</div>

		{!! Form::close() !!}

	</div>
</div>
@endsection

<!-- Real estate farming ... what is it? -->
