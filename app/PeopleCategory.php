<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleCategory extends Model
{
	protected $fillable = [
		'category',
       	'description',
	];
}
