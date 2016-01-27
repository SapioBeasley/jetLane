<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
	protected $fillable = [
		'category',
       	'description',
	];
}
