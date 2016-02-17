<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleContact extends Model
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
		// 'notes',
		'created_by',
	];

	public function companies()
	{
		return $this->belongsToMany('App\CompanyContact');
	}

	public function category()
	{
		return $this->belongsToMany('App\PeopleCategory');
	}

	public function canView()
	{
		return $this->belongsToMany('App\User');
	}

	public function notesHistory()
	{
		return $this->belongsToMany('App\NotesHistory');
	}
}
