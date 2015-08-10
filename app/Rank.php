<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
	protected $table = "rank";

	protected $fillable = [
		'min_score',
		'name',
		'max_time',
		'max_time_special',
	];

	public function scopeFromScore($query, $score)  
	{
		return $query->where('min_score', '<=', $score)->orderBy('min_score', 'desc')->take(1);
	}
		
}
