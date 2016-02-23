<div class="col-md-12">
	<div class="form-group">
		{!! Form::label('loan_title', 'Loan Title') !!}
		{!! Form::text('loan_title', null, ['class' => 'form-control', 'placeholder' => 'Loan Title']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('loan_subtitle', 'Loan Subtitle') !!}
		{!! Form::text('loan_subtitle', null, ['class' => 'form-control', 'placeholder' => 'Loan Subtitle']) !!}
	</div>

	<div class="page-header">
		<h6>Loan Type</h6>
	</div>

	<div class="row">

		<label class="col-md-4">
			{!! Form::checkbox('fha', '1', null) !!} FHA
		</label>

		<label class="col-md-4">
			{!! Form::checkbox('VA', '1', null) !!} VA
		</label>

		<label class="col-md-4">
			{!! Form::checkbox('Conventional', '1', null) !!} Conventional
		</label>

	</div>

	<div class="page-header">
		<h6>Details</h6>
	</div>

	<div class="row">
		<div class="form-group col-md-2">
			{!! Form::label('term', 'Term') !!}
			{!! Form::text('term', null, ['class' => 'form-control', 'placeholder' => 'Term']) !!}
		</div>

		<div class="form-group col-md-2">
			{!! Form::label('rate', 'Rate') !!}
			{!! Form::text('rate', null, ['class' => 'form-control', 'placeholder' => 'rate']) !!}
		</div>

		<div class="form-group col-md-4">
			{!! Form::label('min_down_payment', 'Min. Down Payment') !!}
			{!! Form::text('min_down_payment', null, ['class' => 'form-control', 'placeholder' => 'Min. Down Payment']) !!}
		</div>

		<div class="form-group col-md-4">
			{!! Form::label('front_end_mortgate_insurence', 'Front End Mortgate Insurence') !!}
			{!! Form::text('front_end_mortgate_insurence', null, ['class' => 'form-control', 'placeholder' => 'Front End Mortgate Insurence']) !!}
		</div>
	</div>

	<div class="page-header">
		<h6>Burnoff Rates</h6>
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			{!! Form::label('bankrupcy_burnoff', 'Bankrupcy') !!}
			{!! Form::text('bankrupcy_burnoff', null, ['class' => 'form-control', 'placeholder' => 'Bankrupcy']) !!}
		</div>

		<div class="form-group col-md-4">
			{!! Form::label('foreclosure_burnoff', 'Foreclosure') !!}
			{!! Form::text('foreclosure_burnoff', null, ['class' => 'form-control', 'placeholder' => 'Foreclosure']) !!}
		</div>

		<div class="form-group col-md-4">
			{!! Form::label('short_sale_burnoff', 'Short Sale') !!}
			{!! Form::text('short_sale_burnoff', null, ['class' => 'form-control', 'placeholder' => 'Short Sale']) !!}
		</div>
	</div>

	<div class="page-header">
		<h6>Qualifiers</h6>
	</div>

	<div class="row">

		<label class="col-md-3">
			{!! Form::checkbox('owner_occupant_only', '1', null) !!} Owner Occupant Only
		</label>

		<label class="col-md-3">
			{!! Form::checkbox('second_home', '1', null) !!} Second Home
		</label>

		<label class="col-md-3">
			{!! Form::checkbox('two_loans', '1', null) !!} Two Loans
		</label>

		<label class="col-md-3">
			{!! Form::checkbox('conforming_loan', '1', null) !!} Conforming Loan
		</label>

	</div>

	<div class="page-header">
		<h6>Fees</h6>
	</div>

	<div class="row">
		<div class="form-group col-md-6">
			{!! Form::label('lender_fee', 'Lender Fee') !!}
			{!! Form::text('lender_fee', null, ['class' => 'form-control', 'placeholder' => 'Lender Fee']) !!}
		</div>

		<div class="form-group col-md-6">
			{!! Form::label('origination_fee', 'Origination Fee') !!}
			{!! Form::text('origination_fee', null, ['class' => 'form-control', 'placeholder' => 'Origination Fee']) !!}
		</div>
	</div>

	<div class="page-header">
		<h6>Limits / Min Fico</h6>
	</div>

	<div class="row">
		<div class="form-group col-md-3">
			{!! Form::label('front_end_limit', 'Front End Limit') !!}
			{!! Form::text('front_end_limit', null, ['class' => 'form-control', 'placeholder' => 'Front End Limit']) !!}
		</div>
		<div class="form-group col-md-3">
			{!! Form::label('back_end_limit', 'Back End Limit') !!}
			{!! Form::text('back_end_limit', null, ['class' => 'form-control', 'placeholder' => 'Back End Limit']) !!}
		</div>
		<div class="form-group col-md-3">
			{!! Form::label('contribution_limit', 'Contribution Limit') !!}
			{!! Form::text('contribution_limit', null, ['class' => 'form-control', 'placeholder' => 'Contribution Limit']) !!}
		</div>
		<div class="form-group col-md-3">
			{!! Form::label('loan_limit', 'Loan Limit') !!}
			{!! Form::text('loan_limit', null, ['class' => 'form-control', 'placeholder' => 'Loan Limit']) !!}
		</div>
		<div class="form-group col-md-3">
			{!! Form::label('min_fico', 'Min. Fico') !!}
			{!! Form::text('min_fico', null, ['class' => 'form-control', 'placeholder' => 'Min. Fico']) !!}
		</div>
	</div>

</div>
