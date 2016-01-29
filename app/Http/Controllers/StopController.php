<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StopRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\Stop;
use App\Log;

class StopController extends Controller
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
		return view('stops.index')
			->withStops(Stop::paginate(20))
			->withUser($this->user);
	}

	public function create(User $user)
	{
		return view('stops.create')->withUser($user);
	}

	public function edit($id, User $user)
	{
		if (!($user->auth & \Config::get('admin.adminStop'))) return response(view('errors.error', ['title' => '权限不足', 'error' => '您没有管理车站的权限！']), 403);
		return view('stops.edit')
			->withUser($user)
			->withStop(Stop::find($id));
	}

	public function update(StopRequest $request, $id, User $user)
	{
		$stop = Stop::findOrFail($id);
        $log = new Log();
        $log->user_id = $user->id;
		$log->log = "编辑车站" . print_r($stop->toArray(), true);
		$stop->fill($request->all());
		$stop->save();
        $log->save();
		return redirect()->action('StopController@index');
	}


	public function store(StopRequest $request, User $user)
	{
		$stop = new Stop;
		$stop->fill($request->all());
		$stop->save();
        $log = new Log();
        $log->user_id = $user->id;
        $log->log = "新建车站" . $stop->id;
        $log->save();
		return redirect()->action('StopController@index');
	}

	public function destroy($id, User $user)
	{
		$stop = Stop::find($id);
        $log = new Log();
        $log->user_id = $user->id;
		$log->log = "删除车站" . print_r($stop->toArray(), true);
        $log->save();
		Stop::destroy($id);
		return redirect()->action('StopController@index');
	}
}
