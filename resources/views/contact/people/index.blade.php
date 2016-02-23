@extends('layouts.app')

@section('content')
<h4>View All People</h4>

<div class="panel panel-default">
	<div class="panel-body">

		<ul class="nav nav-pills">
			@foreach($peopleCategories as $category)
				<li role="presentation"><a href="?filter={{strtolower($category['category'])}}">{{$category['category']}}</a></li>
			@endforeach
		</ul>

		@include('contact.people.includes.contactsLoop')

	</div>
</div>
@endsection
