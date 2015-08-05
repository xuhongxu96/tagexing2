<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
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
		'department',
	];
}
