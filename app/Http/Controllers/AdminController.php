<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RentRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\Rank;
use App\Stop;
use App\Help;
use App\Rent;
use App\Bike;
use DB;

class AdminController extends Controller
{
    protected $user;

    /**
     * Constructor
     *
     * @param App\User $user
     */
    public function __construct(User $user)
    {
        $this->middleware('admin');
        $this->user = $user;
    }

    public function getIndex()
    {
        $summary = (object)[
            'newUser' => User::where('state', '=', 'register')->orWhere('state', '=', 'auth')->count(),
            'breakBike' => Bike::where('state', '=', 'repairing')->orWhere('state', '=', 'repaired')->orWhere('state', '=', 'broken')->count(),
            'disabledUser' => User::where('state', '=', 'disabled')->count(),
            'userCount' => User::count(),
            'validUser' => User::where('total', '>=', 300)->count(),
            'stopCount' => Stop::count(),
            'rentingUser' => User::where('state', '=', 'rented')->count(),
            'rentTimes' => Rent::where('type', '=', 'rent')->count(),
            'returnTimes' => Rent::where('type', '=', 'return')->count(),
            'bikeCount' => Bike::count(),
            'adminCount' => User::where('auth', '>', 0)->count(),
        ];
        return view('admin/index')
            ->withSummary($summary)
            ->withUser($this->user);
    }

    function getHelp()
    {
        return view('admin/help')
            ->withHelp(Help::orderBy('item_order')->get())
            ->withUser($this->user);
    }

    function getRentInfo(Request $request)
    {
		$id = $request->input('id');
		if ($id == null)
			$data = Rent::orderBy('id', 'DESC')->paginate(20);
		else
			$data = Rent::where('id', '=', $id)->paginate(20);
		return view('admin/rentInfo')
            ->withRent($data)
            ->withUser($this->user);
    }

	public function postCommentRent(RentRequest $request, $id)
	{
		$rent = Rent::find($id);
		$rent->comment = $request->input('comment');
		return $rent->save() ? '成功' : '失败';
	}

}
