<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimingTemplate extends Model
{
	protected $fillable = [
		'template',
		'description',
	];
}
