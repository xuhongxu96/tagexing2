<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RankRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\Rank;
use App\Log;

class RankController extends Controller
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
		return view('rank.index')
			->withRank(Rank::paginate(20))
			->withUser($this->user);
	}

	public function create(User $user)
	{
		return view('rank.create')->withUser($user);
	}

	public function show($id)
	{
		return view('rank.rank')->withRank(Rank::find($id));
	}


	public function edit($id, User $user)
	{
		if (!($user->auth & \Config::get('admin.adminLevel'))) return response(view('errors.error', ['title' => '权限不足', 'error' => '您没有管理帮助页面的权限！']), 403);
		return view('rank.edit')
			->withUser($user)
			->withRank(Rank::find($id));
	}

	public function update(RankRequest $request, $id, User $user)
	{
		$rank = Rank::findOrFail($id);
		$rank->fill($request->all());
		$rank->save();
        $log = new Log();
        $log->user_id = $user->id;
        $log->log = "编辑等级" . $id;
        $log->save();
		return redirect()->action('RankController@index');
	}


	public function store(RankRequest $request, User $user)
	{
		$rank = new Rank;
		$rank->fill($request->all());
		$rank->save();
        $log = new Log();
        $log->user_id = $user->id;
        $log->log = "新建等级" . $rank->id;
        $log->save();
		return redirect()->action('RankController@index');
	}

	public function destroy($id)
	{
		Rank::destroy($id);
		return redirect()->action('RankController@index');
	}
}
