@extends('layouts.app')

@section('content')
<div class="row">

	<div class="col-md-6">
		<h4>Loan Data</h4>
	</div>

	<div class="col-md-6">
		<div class="bottom">
			<a class="btn btn-primary btn-sm" href="{{route('loans.edit', $loan['id'])}}">
			Edit
			</a>
			<a class="btn btn-success btn-sm" href="{{route('loans.create')}}">
			Add New
			</a>
		</div>
	</div>

</div>

<div class="panel panel-default">
	<div class="panel-body">

		<div class="col-md-12">
			<div class="page-header">
				<h6>General</h6>
			</div>
		</div>

            	<div class="col-md-12">
            		<strong>Loan Id:</strong> {{crc32($loan['id'])}}
            	</div>

            	<div class="col-md-4">
	            	<strong>Loan Title: </strong> {{$loan['loan_title']}}
		</div>

		<div class="col-md-8">
			<strong>Loan Subtitle: </strong> {{$loan['loan_subtitle']}}
		</div>

		<div class="col-md-12">
			<div class="page-header">
				<h6>Loan Type</h6>
			</div>
		</div>

		<div class="col-md-4">
			<strong>FHA: </strong> {{$loan['fha'] ? 'Yes' : 'No'}}
		</div>

		<div class="col-md-4">
			<strong>VA: </strong> {{$loan['VA'] ? 'Yes' : 'No'}}
		</div>

		<div class="col-md-4">
			<strong>Conventional: </strong> {{$loan['Conventional'] ? 'Yes' : 'No'}}
		</div>

		<div class="col-md-12">
			<div class="page-header">
				<h6>Details</h6>
			</div>
		</div>

		<div class="col-md-2">
			<strong>Term: </strong> {{$loan['term']}}
		</div>

		<div class="col-md-2">
			<strong>Rate: </strong> {{$loan['rate']}}
		</div>

		<div class="col-md-4">
			<strong>Min. Down Payment: </strong> {{$loan['min_down_payment']}}
		</div>

		<div class="col-md-4">
			<strong>Front End Mortgate Insurence: </strong> {{$loan['front_end_mortgate_insurence']}}
		</div>

		<div class="col-md-4">
			<strong>Second Home: </strong> {{$loan['second_home'] ? 'Yes' : 'No'}}
		</div>

		<div class="col-md-4">
			<strong>Two Loans: </strong> {{$loan['two_loans'] ? 'Yes' : 'No'}}
		</div>

		<div class="col-md-4">
			<strong>Conforming Loan: </strong> {{$loan['conforming_loan'] ? 'Yes' : 'No'}}
		</div>

		<div class="col-md-4">
			<strong>Owner Occupant Only: </strong> {{$loan['owner_occupant_only'] ? 'Yes' : 'No'}}
		</div>

		<div class="col-md-12">
			<strong>Min Fico: </strong> {{$loan['min_fico']}}
		</div>

		<div class="col-md-12">
			<div class="page-header">
				<h6>Burnoffs</h6>
			</div>
		</div>

		<div class="col-md-4">
			<strong>Bankrupcy Burnoff: </strong> {{$loan['bankrupcy_burnoff']}}
		</div>

		<div class="col-md-4">
			<strong>Foreclosure Burnoff: </strong> {{$loan['foreclosure_burnoff']}}
		</div>

		<div class="col-md-4">
			<strong>Short Sale Burnoff: </strong> {{$loan['short_sale_burnoff']}}
		</div>

		<div class="col-md-12">
			<div class="page-header">
				<h6>Fees</h6>
			</div>
		</div>

		<div class="col-md-4">
			<strong>Lender Fee: </strong> {{$loan['lender_fee']}}
		</div>

		<div class="col-md-4">
			<strong>Origination Fee: </strong> {{$loan['origination_fee']}}
		</div>

		<div class="col-md-12">
			<div class="page-header">
				<h6>Limits</h6>
			</div>
		</div>

		<div class="col-md-3">
			<strong>Front End Limit: </strong> {{$loan['front_end_limit']}}
		</div>

		<div class="col-md-3">
			<strong>Back End Limit: </strong> {{$loan['back_end_limit']}}
		</div>

		<div class="col-md-3">
			<strong>Contribution Limit: </strong> {{$loan['contribution_limit']}}
		</div>

		<div class="col-md-3">
			<strong>Loan Limit: </strong> {{$loan['loan_limit']}}
		</div>

		<div class="col-md-12">
			{!! Form::open(['route' => ['loans.delete', $loan['id']], 'method' => 'DELETE']) !!}

				<div class="form-group">
					{!! Form::submit('Delete Loan', ['class' => 'btn btn-danger btn-sm']) !!}
				</div>
			{!! Form::close() !!}
		</div>

	</div>

</div>
@endsection
