<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Stop;
use App\Tools\OTPCheck;

class RentController extends Controller
{

	protected $user;

	/**
	 * Constructor
	 *
	 * @param App\User $user
	 */
	public function __construct(User $user)
	{
		$this->middleware('normal');
		$this->user = $user;
	}

	public function getStops()
	{
		return view('rent.stops')
			->withStops(Stop::with('bikes')->get()->sortBy(function($stop){
				return $stop->bikes->count();
			}, null, true));
	}

	public function getBikes($stopId)
	{
		$stop = Stop::find($stopId)->first();
		return view('rent.bikes')->withStop($stop)
								 ->withBikes($stop->bikes);
	}

	public function getCode($stopId, $bikeId)
	{
		return view('rent.code', compact('stopId', 'bikeId'));
	}

	public function postRent(Request $request, $data)
	{

	}

}
