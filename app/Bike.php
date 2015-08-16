<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
	protected $fillable = [
		'qrcode_id',
		'name',
		'state',
		'stop_id',
		'password',
	];

	public function getDates()
	{
		return [
			"created_at",
			"updated_at",
		];
	}

	public function stop()
	{
		return $this->belongsTo('App\Stop');
	}

	public function rent()
	{
		return $this->hasMany('App\Rent');
	}
}
