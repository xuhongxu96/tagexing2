<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
	protected $table = 'rent';

	public function getDates()
	{
		return [
			"created_at",
			"updated_at",
		];
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function bike()
	{
		return $this->belongsTo('App\Bike');
	}

	public function stop()
	{
		return $this->belongsTo('App\Stop');
	}

	public function scopeLastRent($query)
	{
		return $query->where('type', '=', 'rent')->orderBy('id', 'desc');
	}

	public function scopeLastReturn($query)
	{
		return $query->where('type', '=', 'return')->orderBy('id', 'desc');
	}
}
