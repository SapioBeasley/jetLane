@extends('layouts.app')

@section('content')
<div class="row">

	<div class="col-md-6">
		<h4>Company Profile</h4>
	</div>

	<div class="col-md-6">
		<div class="bottom">
			<a class="btn btn-primary btn-sm" href="{{route('contact.company.edit', $contact['id'])}}">
			Edit
			</a>
			<a class="btn btn-success btn-sm" href="{{route('contact.company.create')}}">
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
				<img alt="" src="http://www.justprop.com/components/com_djclassifieds/images/id_images/51.jpg">
			</div>

			<div class="info">

				<div class="title">
					{{$contact['name']}}
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
			<strong>Name:</strong> {{$contact['name']}}
		</div>

		<div class="col-md-4">
			<strong>DBA:</strong>{{$contact['dba']}}
		</div>

		<div class="col-md-4">
			<strong>Country:</strong>{{$contact['country']}}
		</div>

		<div class="col-md-12">
			<strong>Organization:</strong>{{$contact['organization']}}
		</div>

		<div class="col-md-12"></div>

		<div class="col-md-12">
			<h5>Contact</h5>
		</div>

		<div class="col-md-4">
			<strong>Primary Phone:</strong>{{$contact['phone']}}
		</div>

		<div class="col-md-4">
			<strong>Mobile Phone:</strong>{{$contact['mobile_phone']}}
		</div>

		<div class="col-md-4">
			<strong>Other Phone:</strong>{{$contact['other_phone']}}
		</div>

		<div class="col-md-4">
			<strong>Primary Email:</strong> {{$contact['email_1']}}
		</div>

		<div class="col-md-4">
			<strong>Secondary Email:</strong> {{$contact['email_2']}}
		</div>

		<div class="col-md-4">
			<strong>Third Email:</strong> {{$contact['email_3']}}
		</div>

		<div class="col-md-12">
			<h5>Website</h5>
			{{$contact['website']}}
			<br>
			<br>
		</div>

		<div class="col-md-12">
			{!! Form::open(['route' => ['contact.company.delete', $contact['id']], 'method' => 'DELETE']) !!}

				<div class="form-group">
					{!! Form::submit('Delete Company', ['class' => 'btn btn-danger btn-sm']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
