<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
	protected $fillable = [
		'category',
       	'description',
	];
}
