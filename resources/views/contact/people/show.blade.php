@extends('layouts.app')

@section('content')
<div class="row">

	<div class="col-md-6">
		<h4>Person Profile</h4>
	</div>

	<div class="col-md-6">
		<div class="bottom">
			<a class="btn btn-primary btn-sm" href="{{route('contact.people.edit', $contact['id'])}}">
			Edit
			</a>
			<a class="btn btn-success btn-sm" href="{{route('contact.people.create')}}">
			Add New
			</a>
		</div>
	</div>

</div>

<div class="panel panel-default">
	<div class="panel-body">

		<div class="card hovercard">

            		<button type="button" class="btn btn-primary btn-xs pull-left" >Id:{{crc32($contact['id'])}}</button><button class="btn btn-primary btn-xs pull-right">{{$contact['updated_at']}}</button>

                	<div class="cardheader" style="background: url({{url('/images/contact-header-images/contact-header.jpg')}});background-size: cover;height: 180px;"></div>

			<div class="avatar">
				<img alt="" src="{{$contact['avatar']}}">
			</div>

			<div class="info">

				<div class="title">
					{{$contact['first_name']}} {{$contact['middle_name']}} {{$contact['last_name']}}
				</div>

				<div class="desc">
					{{$contact['address_street']}} {{$contact['address_city']}}, {{$contact['address_state']}} {{$contact['address_zip']}}
				</div>

			</div>

            </div>

            	<div class="col-md-12">
            		<h5>General Info</h5>
            	</div>

            	<div class="col-md-4">
			<strong>First Name:</strong> {{$contact['first_name']}}
		</div>

		<div class="col-md-4">
			<strong>Middle Name:</strong> {{$contact['middle_name']}}
		</div>

		<div class="col-md-12"></div>

		<div class="col-md-4">
			<strong>Last Name:</strong> {{$contact['last_name']}}
		</div>

		<div class="col-md-12"></div>

		<div class="col-md-4">
			<strong>Birthday:</strong> {{$contact['birthday_day']}} {{$contact['birthday_month']}} {{$contact['birthday_year']}}
		</div>

		<div class="col-md-4">
			<strong>Gender:</strong> {{$contact['gender']}}
		</div>

		<div class="col-md-4">
			<strong>tax ID:</strong> {{$contact['tax_id']}}
		</div>

		<div class="col-md-4">
			<strong>Country:</strong>{{$contact['country']}}
		</div>

		<div class="col-md-12"></div>

		<div class="col-md-12">
			<h5>Contact</h5>
		</div>

		<div class="col-md-4">
			<strong>Home Phone:</strong>{{$contact['home_phone']}}
		</div>

		<div class="col-md-4">
			<strong>Business Phone:</strong>{{$contact['business_phone']}}
		</div>

		<div class="col-md-4">
			<strong>Mobile Phone:</strong>{{$contact['mobile_phone']}}
		</div>

		<div class="col-md-4">
			<strong>Other Phone:</strong>{{$contact['other_phone']}}
		</div>

		<div class="col-md-4">
			<strong>Fax:</strong>{{$contact['fax']}}
		</div>

		<div class="col-md-12"></div>

		<div class="col-md-4">
			<strong>Primary Email:</strong> {{$contact['email_1']}}
		</div>

		<div class="col-md-4">
			<strong>Secondary Email:</strong> {{$contact['email_2']}}
		</div>

		<div class="col-md-4">
			<strong>Third Email:</strong> {{$contact['email_3']}}
			<br>
			<br>
		</div>

		<div class="col-md-12">
			{!! Form::open(['route' => ['contact.people.delete', $contact['id']], 'method' => 'DELETE']) !!}

				<div class="form-group">
					{!! Form::submit('Delete Person', ['class' => 'btn btn-danger btn-sm']) !!}
				</div>
			{!! Form::close() !!}
		</div>

	</div>

</div>
@endsection
