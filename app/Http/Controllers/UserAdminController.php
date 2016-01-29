<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserAdminRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\Log;

class UserAdminController extends Controller
{

    protected $user;

    /**
     * Constructor
     *
     * @param App\User $user
     */
    public function __construct(User $user)
    {
        $this->middleware('adminuser');
        $this->user = $user;
    }

	public function index()
	{
		return view('useradmin.index')
			->withUser($this->user)
			->withUsers(User::orderByRaw("FIELD(`state`, 'register', 'auth', 'disabled', 'rented', 'normal')")->orderBy('id', 'desc')->paginate(20))
			;
	}

	public function show($id)
	{
		return view('useradmin.show')
			->withUser($this->user)
			->withInfo(User::find($id))
			;
	}


	public function edit($id, User $user)
	{
		if (!($user->auth & \Config::get('admin.adminUser'))) return response(view('errors.error', ['title' => '权限不足', 'error' => '您没有管理用户的权限！']), 403);
		return view('useradmin.edit')
			->withUser($user)
			->withInfo(User::find($id));
	}

	public function update(UserAdminRequest $request, $id, User $admin)
	{
		if (!($admin->auth & \Config::get('admin.adminUser'))) return response(view('errors.error', ['title' => '权限不足', 'error' => '您没有管理用户的权限！']), 403);
		$user = User::findOrFail($id);
        $log = new Log();
        $log->user_id = $admin->id;
		$log->log = "编辑用户" . print_r($user->toArray(), true);
		$user->fill($request->all());
		if(!($request->input('free_at')))
			$user->free_at = null;
		$user->save();
        $log->save();
		return redirect()->action('UserAdminController@index');
	}


	public function auth(Request $request, User $admin)
	{
		if (!($admin->auth & \Config::get('admin.adminAuth'))) return response(view('errors.error', ['title' => '权限不足', 'error' => '您没有管理帮助页面的权限！']), 403);
		$id = $request->get('id');
		$user = User::findOrFail($id);

        $log = new Log();
        $log->user_id = $admin->id;

		if ($user->state == 'register' || $user->state == 'auth') {
			$log->log = "认证用户" . $user->id . $user->name;
			$user->state = 'normal';
		} else if ($user->state == 'normal' || $user->state == 'disabled') {
			$log->log = "取消认证用户" . $user->id . $user->name;
			$user->state = 'register';
		}

        $log->save();

		$user->save();
		return redirect()->action('UserAdminController@index');
	}

	public function admin(User $user, $id)
	{
		return view('useradmin.admin')
			->withUser($user)
			->withInfo(User::find($id));
	}

	public function updateAdmin(Request $request,User $admin, $id) 
	{
		if (!($admin->auth & \Config::get('admin.adminSetting'))) return response(view('errors.error', ['title' => '权限不足', 'error' => '您没有管理管理员的权限！']), 403);
		$key = $request->input('admin');
		$res = 0;
		foreach($key as $v)
			$res |= $v;
		$user = User::find($id);
        $log = new Log();
        $log->user_id = $admin->id;
		$log->log = "编辑用户权限" . $user->id . ": " . $user->auth;
		$user->auth = $res;
		$user->save();
        $log->save();
		return redirect()->action('UserAdminController@index');
	}
}
