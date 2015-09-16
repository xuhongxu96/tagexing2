<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
	protected $table = 'help';

	protected $fillable = [
		'type',
		'title',
		'class',
		'page_title',
		'content',
	];
}
