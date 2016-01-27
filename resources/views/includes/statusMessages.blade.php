@if (Session::has('success_message'))

	<div class="alert alert-success">
		<h4>Success!</h4>
		<p>{{Session::get('success_message')}}</p>
	</div>

@elseif (Session::has('warning_message'))

	<div class="alert alert-warning">
		<h4>Warning!</h4>
		<p>{{Session::get('warning_message')}}</p>
	</div>

@elseif (Session::has('fail_message'))

	<div class="alert alert-danger">
		<h4>Error!</h4>
		<p>{{Session::get('fail_message')}}</p>
	</div>

@endif
