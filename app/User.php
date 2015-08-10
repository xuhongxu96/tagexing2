<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use App\Tools\DateIntervalEnhanced;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

	protected $fillable = [
		'openid',
		'name',
		'gender',
		'email',
		'mobile',
		'qq',
		'state',
		'free_at',
		'score',
		'total',
		'message',
		'auth',
		'school',
		'student_id',
		'student_type',
		'department',
	];

	public function getDates()
	{
		return [
			"free_at",
		];
	}

	public function getTotalAttribute($value)
	{
		return (new DateIntervalEnhanced('PT' . $value . 'S'))->recalculate()->format('%y年%m月%d天 %h时%i分');
	}

}
