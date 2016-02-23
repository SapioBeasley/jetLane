@extends('layouts.app')

@section('content')
<h4>Edit Loan</h4>

<div class="panel panel-default">
	<div class="panel-body">

		{!! Form::model($loan, ['route' => ['loans.update', $loan['id']], 'method' => 'PUT']) !!}

			@include('loans.includes.informationForm')

			<div class="col-md-12">
				<div class="form-group">
					{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
				</div>
			</div>

		{!! Form::close() !!}

	</div>
</div>
@endsection

<!-- Real estate farming ... what is it? -->
