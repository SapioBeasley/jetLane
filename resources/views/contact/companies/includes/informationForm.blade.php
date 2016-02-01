<div class="col-md-6">

	<div class="page-header">
		<h6><strong>General Info</strong></h6>
	</div>

	<div class="form-group">
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('dba', 'DBA') !!}
		{!! Form::text('dba', null, ['class' => 'form-control', 'placeholder' => 'DBA']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('organization', 'Organization') !!}
		{!! Form::text('organization', null, ['class' => 'form-control', 'placeholder' => 'Organization']) !!}
	</div>

	<div class="page-header">
		<h6>Company Type</h6>
	</div>

	<div class="row">
		@include('contact.companies.includes.categories')
	 </div>

	<div class="page-header">
		<h6><strong>Contact Information</strong></h6>
	</div>

	<div class="form-group">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#email1" data-toggle="tab">Primary Email</a></li>
			<li><a href="#email2" data-toggle="tab">Secondary Email</a></li>
			<li><a href="#email3" data-toggle="tab">Other Email</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="email1">
				{{Form::email('email_1', null, ['class' => 'form-control', 'placeholder' => 'Primary Email'])}}
			</div>
			<div class="tab-pane fade" id="email2">
				{{Form::email('email_2', null, ['class' => 'form-control', 'placeholder' => 'Secondary Email (optional)'])}}
			</div>
			<div class="tab-pane fade" id="email3">
				{{Form::email('email_3', null, ['class' => 'form-control', 'placeholder' => 'Other Email (optional)'])}}
			</div>
		</div>
	</div>

	<div class="form-group">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#phone1" data-toggle="tab">Phone</a></li>
			<li><a href="#phone2" data-toggle="tab">Mobile Phone</a></li>
			<li><a href="#phone3" data-toggle="tab">Other Phone</a></li>
			<li><a href="#fax" data-toggle="tab">Fax</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="phone1">
				{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
			</div>
			<div class="tab-pane fade" id="phone2">
				{!! Form::text('mobile_phone', null, ['class' => 'form-control', 'placeholder' => 'Mobile Phone']) !!}
			</div>
			<div class="tab-pane fade" id="phone3">
				{!! Form::text('other_phone', null, ['class' => 'form-control', 'placeholder' => 'Other Phone']) !!}
			</div>
			<div class="tab-pane fade" id="fax">
				{!! Form::text('fax', null, ['class' => 'form-control', 'placeholder' => 'Fax']) !!}
			</div>
		</div>
	</div>

	<div class="page-header">
		<h6><strong>Address</strong></h6>
	</div>

	<div class="form-group">
		{!! Form::label('address_street', 'Street') !!}
		{!! Form::text('address_street', null, ['class' => 'form-control', 'placeholder' => 'Street']) !!}
	</div>

	<div class="row">
		<div class="form-group col-md-6">
			{!! Form::label('address_city', 'City') !!}
			{!! Form::text('address_city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
		</div>
		<div class="form-group col-md-6">
			{!! Form::label('address_state', 'State') !!}
			{!! Form::text('address_state', null, ['class' => 'form-control', 'placeholder' => 'State']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('address_zip', 'Zip') !!}
		{!! Form::text('address_zip', null, ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('country', 'Country') !!}
		{!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Country']) !!}
	</div>

</div>

<div class="col-md-6">

	<div class="page-header">
		<h6><strong>Website</strong></h6>
	</div>

	<div class="form-group">
		{!! Form::label('website', 'Website') !!}
		{!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Website']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('notes', 'Notes') !!}
		{!! Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => 'Notes']) !!}
	</div>

</div>
