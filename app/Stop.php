<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
	protected $fillable = [
		'name',
		'code',
	];

	public function getDates()
	{
		return [
			"created_at",
			"updated_at",
		];
	}

	public function bikes()
	{
		return $this->hasMany('App\Bike');
	}

	public function rent()
	{
		return $this->hasMany('App\Rent');
	}
}
