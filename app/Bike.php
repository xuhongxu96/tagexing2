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

	public function stop()
	{
		return $this->belongsTo('App\Stop');
	}
}
