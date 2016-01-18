<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
	protected $table = 'logs';

	protected $fillable = [
		'user_id',
		'log',
    ];	

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
