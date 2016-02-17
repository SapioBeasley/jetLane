<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotesHistory extends Model
{
	protected $fillable = [
		'note'
	];

	public function people()
	{
		return $this->belongsToMany('App\PeopleContact');
	}
}
