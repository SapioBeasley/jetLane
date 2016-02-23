@extends('layouts.app')

@section('content')
<h4>View All Loans</h4>

<div class="panel panel-default">
	<div class="panel-body">

		@include('loans.includes.loansLoop')

	</div>
</div>
@endsection
