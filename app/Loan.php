<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
	protected $fillable = [
		'loan_title',
		'loan_subtitle',
		'fha',
		'VA',
		'Conventional',
		'term',
		'rate',
		'min_down_payment',
		'front_end_mortgate_insurence',
		'bankrupcy_burnoff',
		'foreclosure_burnoff',
		'short_sale_burnoff',
		'owner_occupant_only',
		'second_home',
		'two_loans',
		'conforming_loan',
		'lender_fee',
		'origination_fee',
		'front_end_limit',
		'back_end_limit',
		'contribution_limit',
		'loan_limit',
		'min_fico',
	];
}
