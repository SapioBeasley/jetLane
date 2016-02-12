@foreach($canView as $viewer)
	<label class="col-md-6">
		{!! Form::checkbox('can_view[]', $viewer['id'], $viewer['id']) !!} {{$viewer['name']}}
	</label>
@endforeach

@foreach($availableUsers as $user)
	<label class="col-md-6">
		{!! Form::checkbox('can_view[]', $user['id']) !!} {{$user['name']}}
	</label>
@endforeach
