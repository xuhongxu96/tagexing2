<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Help;

class HelpController extends Controller
{
	public function getIndex()
	{
		return view('help.index')->withHelp(Help::all());
	}
	public function getHelp($id)
	{
		return view('help.help')->withHelp(Help::find($id));
	}
}
