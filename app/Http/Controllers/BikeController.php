<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BikeRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\Bike;
use App\Stop;
use App\Log;

class BikeController extends Controller
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

	public function index()
	{
		return view('bikes.index')
			->withBikes(Bike::paginate(20))
			->withUser($this->user);
	}

	public function create(User $user)
	{
		$options = array();
		foreach(Stop::all() as $stop) {
			$options[$stop->id] = $stop->name;
		}
		return view('bikes.create')->withUser($user)->withStop($options);
	}

	public function edit($id, User $user)
	{
		if (!($user->auth & \Config::get('admin.adminBike'))) return response(view('errors.error', ['title' => '权限不足', 'error' => '您没有管理单车的权限！']), 403);
		$options = array();
		foreach(Stop::all() as $stop) {
			$options[$stop->id] = $stop->name;
		}
		return view('bikes.edit')
			->withUser($user)
			->withStop($options)
			->withBike(Bike::find($id));
	}

	public function update(BikeRequest $request, $id, User $user)
	{
		$bike = Bike::findOrFail($id);
        $log = new Log();
        $log->user_id = $user->id;
		$log->log = "编辑单车" . print_r($bike->toArray(), true);
        $log->save();
		$bike->fill($request->all());
		$bike->save();
		return redirect()->action('BikeController@index');
	}


	public function store(BikeRequest $request, User $user)
	{
		$bike = new Bike;
		$bike->fill($request->all());
		$bike->save();
        $log = new Log();
        $log->user_id = $user->id;
        $log->log = "新建单车" . $bike->id;
        $log->save();
		return redirect()->action('BikeController@index');
	}

	public function destroy($id, User $user)
	{
		$bike = Bike::find($id);
        $log = new Log();
        $log->user_id = $user->id;
		$log->log = "删除单车" . print_r($bike->toArray(), true);
		dd($log->log);
		$log->save();
		Bike::destroy($id);
		return redirect()->action('BikeController@index');
	}
}
