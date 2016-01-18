<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Help;
use App\User;
use App\Log;

use App\Http\Requests\HelpRequest;

class HelpController extends Controller
{
	public function index()
	{
		return view('help.index')->withHelp(Help::orderBy('item_order')->get());
	}

	public function create(User $user)
	{
		return view('help.create')->withUser($user);
	}

	public function show($id)
	{
		return view('help.help')->withHelp(Help::find($id));
	}


	public function edit($id, User $user)
	{
		if (!($user->auth & \Config::get('admin.adminHelp'))) return response(view('errors.error', ['title' => '权限不足', 'error' => '您没有管理帮助页面的权限！']), 403);
		return view('help.edit')
			->withUser($user)
			->withHelp(Help::find($id));
	}

	public function update(HelpRequest $helpRequest, $id, User $user)
	{
		$help = Help::findOrFail($id);
		$help->fill($helpRequest->all());
		$help->content = $helpRequest->input(\Editor::input());
		$help->save();
        $log = new Log();
        $log->user_id = $user->id;
        $log->log = "编辑帮助" . $id;
        $log->save();
		return redirect()->action('AdminController@getHelp');
	}


	public function store(HelpRequest $helpRequest, User $user)
	{
		$help = new Help;
		$help->fill($helpRequest->all());
		$help->content = $helpRequest->input(\Editor::input());
		$help->save();
        $log = new Log();
        $log->user_id = $user->id;
        $log->log = "新建帮助" . $help->id;
        $log->save();
		return redirect()->action('AdminController@getHelp');
	}

	public function destroy($id)
	{
		Help::destroy($id);
		return redirect()->action('AdminController@getHelp');
	}
}
