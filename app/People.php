<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
	protected $fillable = [
		'first_name',
		'middle_name',
		'last_name',
		'birthday_day',
		'birthday_month',
		'birthday_year',
		'gender',
		'address_street',
		'address_city',
		'address_state',
		'address_zip',
		'country',
		'home_phone',
		'business_phone',
		'mobile_phone',
		'other_phone',
		'fax',
		'email_1',
		'email_2',
		'email_3',
		'avatar',
		'tax_id',
	];
}
