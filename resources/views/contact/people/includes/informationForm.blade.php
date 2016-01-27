<div class="col-md-6">

	<div class="row">
		<div class="form-group col-md-6">
			{{Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
		</div>

		<div class="form-group col-md-6">
			{{Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
		</div>
	</div>

	<div class="form-group">
		{{Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
	</div>

	<div class="page-header">
		<h6>Internet</h6>
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

	<div class="page-header">
		<h6>Phone Numbers</h6>
	</div>

	<div class="form-group">
		{{Form::text('home_phone', null, ['class' => 'form-control', 'placeholder' => 'Home Phone'])}}
	</div>

	<div class="form-group">
		{{Form::text('business_phone', null, ['class' => 'form-control', 'placeholder' => 'Business Phone'])}}
	</div>

	<div class="form-group">
		{{Form::text('mobile_phone', null, ['class' => 'form-control', 'placeholder' => 'Mobile Phone'])}}
	</div>

	<div class="form-group">
		{{Form::text('other_phone', null, ['class' => 'form-control', 'placeholder' => 'Other Phone'])}}
	</div>

	<div class="form-group">
		{{Form::text('fax', null, ['class' => 'form-control', 'placeholder' => 'Fax'])}}
	</div>

	<div class="page-header">
		<h6>Address</h6>
	</div>

	<div class="form-group">
		{{Form::text('address_street', null, ['class' => 'form-control', 'placeholder' => 'Address Street'])}}
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			{{Form::text('address_city', null, ['class' => 'form-control', 'placeholder' => 'Address City'])}}
		</div>
		<div class="form-group col-md-4">
			{{Form::text('address_state', null, ['class' => 'form-control', 'placeholder' => 'Address State'])}}
		</div>
		<div class="form-group col-md-4">
			{{Form::text('address_zip', null, ['class' => 'form-control', 'placeholder' => 'Address Zip'])}}
		</div>
	</div>

	<div class="form-group">
		{{Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Country'])}}
	</div>

</div>

<div class="col-md-6">

	<div class="row login-page">
		<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
			<img src="http://ani-theme.strapui.com/images/flat-avatar.png" class="user-avatar">
		</div>
	</div>

	<div class="page-header">
		<h6>Upload Avatar</h6>
	</div>

	<div class="form-inline">
		<div class="form-group">
			{{Form::file('avatar')}}
		</div>
	</div>

	<div class="page-header">
		<h6>Misc. Information</h6>
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			{{Form::text('birthday_day', null, ['class' => 'form-control', 'placeholder' => 'Birthday Day'])}}
		</div>
		<div class="form-group col-md-4">
			{{Form::text('birthday_month', null, ['class' => 'form-control', 'placeholder' => 'Birthday Month'])}}
		</div>
		<div class="form-group col-md-4">
			{{Form::text('birthday_year', null, ['class' => 'form-control', 'placeholder' => 'Birthday Year'])}}
		</div>
	</div>

	<div class="form-group">
		{{Form::text('gender', null, ['class' => 'form-control', 'placeholder' => 'Gender'])}}
	</div>

	<div class="form-group">
		{{Form::text('tax_id', null, ['class' => 'form-control', 'placeholder' => 'Tax Id'])}}
	</div>

</div>

<style type="text/css">
	.login-page {
		background: #3ca2e0;
		text-align: center;
		color: #fff;
		padding: 3em;
		border-radius: 5px;
	}

	.user-avatar {
		width: 125px;
		height: 125px;
	}

	.login-page h1 {
		font-weight: 300;
	}

	.login-page .form-content {
		padding: 40px 0;
	}

	.login-page .form-content .input-underline {
		background: 0 0;
		border: none;
		box-shadow: none;
		border-bottom: 2px solid rgba(255,255,255,.4);
		color: #FFF;
		border-radius: 0;
	}

	.login-page .form-content .input-underline:focus {
		border-bottom: 2px solid #fff;
	}

	.input-lg {
		height: 46px;
		padding: 10px 16px;
		font-size: 18px;
		line-height: 1.3333333;
		border-radius: 0;
	}

	.btn-info{
		border-radius: 50px;
		box-shadow: 0 0 0 2px rgba(255,255,255,.8)inset;
		color: rgba(255,255,255,.8);
		background: 0 0;
		border-color: transparent;
		font-weight: 400;
	}
</style>
