<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
	protected $fillable = [
		'name',
		'code',
	];

	public function bikes()
	{
		return $this->hasMany('App\Bike');
	}
}
