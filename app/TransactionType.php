<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
	protected $fillable = [
		'type',
		'description',
	];
}
