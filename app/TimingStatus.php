<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimingStatus extends Model
{
	protected $fillable = [
		'status',
       	'description',
	];
}
