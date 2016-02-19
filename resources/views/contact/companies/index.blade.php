@extends('layouts.app')

@section('content')
<h4>View All Companies</h4>

<div class="panel panel-default">
	<div class="panel-body">

		@include('contact.companies.includes.contactsLoop')

	</div>
</div>
@endsection
