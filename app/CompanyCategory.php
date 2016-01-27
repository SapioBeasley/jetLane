<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
	protected $fillable = [
		'category',
       	'description',
	];
}
