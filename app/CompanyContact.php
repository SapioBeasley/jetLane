<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyContact extends Model
{
	protected $fillable = [
		'name',
		'dba',
		'organization',
		'address_street',
		'address_city',
		'address_state',
		'address_zip',
		'country',
		'phone',
		'mobile_phone',
		'other_phone',
		'fax',
		'email_1',
		'email_2',
		'email_3',
		'website',
		'notes',
		'created_by',
	];

	public function people()
	{
		return $this->belongsToMany('App\PeopleContact');
	}

	public function category()
	{
		return $this->belongsToMany('App\CompanyCategory');
	}

	public function canView()
	{
		return $this->belongsToMany('App\User');
	}
}
