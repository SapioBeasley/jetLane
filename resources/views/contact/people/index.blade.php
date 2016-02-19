@extends('layouts.app')

@section('content')
<h4>View All People</h4>

<div class="panel panel-default">
	<div class="panel-body">

		@include('contact.people.includes.contactsLoop')

	</div>
</div>
@endsection
