<div class="col-md-6">

	<div class="row">
		<div class="form-group col-md-6">
			{!! Form::label('last_name', 'Last Name') !!}
			{!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
		</div>

		<div class="form-group col-md-6">
			{!! Form::label('middle_name', 'Middle Name') !!}
			{!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'Middle Name']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('first_name', 'First Name') !!}
		{!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
	</div>

	<div id="form-group">
		{!! Form::label('company', 'Company') !!}
		{!! Form::select('company', $companiesSelect, ! is_null($contactCompanies) ? $contactCompanies : '0', ['class' => 'form-control']) !!}
	</div>

	<div class="page-header">
		<h6>Person Type</h6>
	</div>

	<div class="row">
		@include('contact.people.includes.categories')
	 </div>

	<div class="page-header">
		<h6>Contact</h6>
	</div>

	<div class="form-group">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#email1" data-toggle="tab">Email 1</a></li>
			<li><a href="#email2" data-toggle="tab">Email 2</a></li>
			<li><a href="#email3" data-toggle="tab">Email 3</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="email1">
				{{Form::email('email_1', null, ['class' => 'form-control', 'placeholder' => 'Primary Email'])}}
			</div>
			<div class="tab-pane fade" id="email2">
				{{Form::email('email_2', null, ['class' => 'form-control', 'placeholder' => 'Secondary Email (optional)'])}}
			</div>
			<div class="tab-pane fade" id="email3">
				{{Form::email('email_3', null, ['class' => 'form-control', 'placeholder' => 'Third Email (optional)'])}}
			</div>
		</div>
	</div>

	<div class="form-group">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#phone1" data-toggle="tab">Phone</a></li>
			<li><a href="#phone2" data-toggle="tab">Business</a></li>
			<li><a href="#phone3" data-toggle="tab">Mobile</a></li>
			<li><a href="#phone4" data-toggle="tab">Other</a></li>
			<li><a href="#fax" data-toggle="tab">fax</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="phone1">
				{{Form::text('home_phone', null, ['class' => 'form-control', 'placeholder' => 'Primary Phone'])}}
			</div>
			<div class="tab-pane fade" id="phone2">
				{{Form::text('business_phone', null, ['class' => 'form-control', 'placeholder' => 'Business Phone'])}}
			</div>
			<div class="tab-pane fade" id="phone3">
				{{Form::text('mobile_phone', null, ['class' => 'form-control', 'placeholder' => 'Mobile Phone'])}}
			</div>
			<div class="tab-pane fade" id="phone4">
				{{Form::text('other_phone', null, ['class' => 'form-control', 'placeholder' => 'Other Phone'])}}
			</div>
			<div class="tab-pane fade" id="fax">
				{{Form::text('fax', null, ['class' => 'form-control', 'placeholder' => 'Fax'])}}
			</div>
		</div>
	</div>

	<div class="page-header">
		<h6>Address</h6>
	</div>

	<div class="form-group">
		{!! Form::label('address_street', 'Street') !!}
		{!! Form::text('address_street', null, ['class' => 'form-control', 'placeholder' => 'Address Street']) !!}
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			{!! Form::label('address_city', 'City') !!}
			{!! Form::text('address_city', null, ['class' => 'form-control', 'placeholder' => 'Address City']) !!}
		</div>
		<div class="form-group col-md-4">
			{!! Form::label('address_state', 'State') !!}
			{!! Form::text('address_state', null, ['class' => 'form-control', 'placeholder' => 'Address State']) !!}
		</div>
		<div class="form-group col-md-4">
			{!! Form::label('address_zip', 'Zip') !!}
			{!! Form::text('address_zip', null, ['class' => 'form-control', 'placeholder' => 'Address Zip']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('country', 'Country') !!}
		{!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Country']) !!}
	</div>

</div>

<div class="col-md-6">

	<div class="row avatar-section">
		<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
			@if (isset($contact['avatar']) && ! empty($contact['avatar']))
				<img src="{{$contact['avatar']}}" class="user-avatar">
			@else
				<img src="http://ani-theme.strapui.com/images/flat-avatar.png" class="user-avatar">
			@endif
		</div>
	</div>

	<div class="page-header">
		<h6>Upload Avatar</h6>
	</div>

	<div class="form-inline">
		<div class="form-group">
			{!! Form::file('avatar', null) !!}
		</div>
	</div>

	<div class="page-header">
		<h6>Misc. Information</h6>
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			{!! Form::label('birthday_day', 'Birthday Day') !!}
			{!! Form::text('birthday_day', null, ['class' => 'form-control', 'placeholder' => 'Day']) !!}
		</div>
		<div class="form-group col-md-4">
			{!! Form::label('birthday_month', 'Birthday Month') !!}
			{!! Form::text('birthday_month', null, ['class' => 'form-control', 'placeholder' => 'Month']) !!}
		</div>
		<div class="form-group col-md-4">
			{!! Form::label('birthday_year', 'Birthday Year') !!}
			{!! Form::text('birthday_year', null, ['class' => 'form-control', 'placeholder' => 'Year']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('gender', 'Gender') !!}
		{!! Form::text('gender', null, ['class' => 'form-control', 'placeholder' => 'Gender']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tax_id', 'Tax ID') !!}
		{!! Form::text('tax_id', null, ['class' => 'form-control', 'placeholder' => 'Tax Id']) !!}
	</div>

	<div class="page-header">
		<h6><strong>Who Can view this Contact?</strong></h6>
	</div>

	<div class="form-group">
		<div class="row">
			@include('contact.people.includes.canView')
		</div>
	</div>

</div>

<div class="col-md-12">

	<div class="form-group">
		{!! Form::label('notes', 'Notes') !!}
		{!! Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => 'Notes']) !!}
	</div>










	<style type="text/css">

#timeline {
  list-style: none;
  position: relative;
}
#timeline:before {
  top: 0;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 2px;
  background-color: #4997cd;
  left: 50%;
  margin-left: -1.5px;
}
#timeline .clearFix {
  clear: both;
  height: 0;
}
#timeline .timeline-badge {
  color: #fff;
  width: 50px;
  height: 50px;
  font-size: 1.2em;
  text-align: center;
  position: absolute;
  top: 20px;
  left: 50%;
  margin-left: -25px;
  background-color: #4997cd;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}
#timeline .timeline-badge span.timeline-balloon-date-day {
  font-size: 1.4em;
}
#timeline .timeline-badge span.timeline-balloon-date-month {
  font-size: .7em;
  position: relative;
  top: -10px;
}
#timeline .timeline-badge.timeline-filter-movement {
  background-color: #ffffff;
  font-size: 1.7em;
  height: 35px;
  margin-left: -18px;
  width: 35px;
  top: 40px;
}
#timeline .timeline-badge.timeline-filter-movement a span {
  color: #4997cd;
  font-size: 1.3em;
  top: -1px;
}
#timeline .timeline-badge.timeline-future-movement {
  background-color: #ffffff;
  height: 35px;
  width: 35px;
  font-size: 1.7em;
  top: -16px;
  margin-left: -18px;
}
#timeline .timeline-badge.timeline-future-movement a span {
  color: #4997cd;
  font-size: .9em;
  top: 2px;
  left: 1px;
}
#timeline .timeline-movement {
  position: relative;
}
#timeline .timeline-movement.timeline-movement-top {
  height: 60px;
}
#timeline .timeline-movement .timeline-item {
  padding: 20px 0;
}
#timeline .timeline-movement .timeline-item .timeline-panel {
  border: 1px solid #d4d4d4;
  border-radius: 3px;
  background-color: #FFFFFF;
  color: #666;
  padding: 10px;
  position: relative;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}
#timeline .timeline-movement .timeline-item .timeline-panel .timeline-panel-ul {
  list-style: none;
  padding: 0;
  margin: 0;
}
#timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul {
  text-align: left;
}
#timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul li {
  color: #666;
}
#timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul li span.importo {
  color: #468c1f;
  font-size: 1.3em;
}
#timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul {
  text-align: left;
}
#timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul span.importo {
  color: #e2001a;
  font-size: 1.3em;
}
	</style>













	<div id="timeline">
		<div class="row timeline-movement">

			@foreach ($notesHistory as $note)

				<div class="col-sm-12  timeline-item">
					<div class="row">
						<div class="col-sm-12">
							<div class="timeline-panel credits">
								<ul class="timeline-panel-ul">
									<!-- <li><span class="importo">Mussum ipsum cacilds</span></li>
									<li> -->
										<span class="causale">
											{{$note['note']}}
										</span>
									</li>
									<li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{date('F d, Y', strtotime($note['created_at']))}}</small></p> </li>
								</ul>
							</div>

						</div>
					</div>
				</div>

			@endforeach

		</div>
	</div>
</div>
