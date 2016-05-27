<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\OldUser;
use App\Http\Middleware\UserAuth;

class UsersController extends Controller
{

	protected $user;

	/**
	 * Constructor
	 *
	 * @param App\User $user
	 */
	public function __construct(User $user)
	{
		$this->middleware('auth');
		$this->user = $user;
	}


    /**
     * 显示注册用户的表单
     *
     * @return Response
     */
    public function create()
    {
		if (empty($this->user->state))
			return view('users.create')->withUser($this->user);
		else 
			return response(view('errors.error', ['title' => '权限不足', 'error' => '您已注册过！']), 403);
    }

    /**
     * 存储新用户
     *
     * @param  UserRequest  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
		$this->user->fill($request->all());
		$this->user->score = max(60, OldUser::where('openid', $this->user->openid)->first()->score);
		$this->user->save();
		return redirect()->action('RegisterController@index');
    }

    /**
     * 显示用户信息
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		// TODO: 管理员查看用户信息
		if ($this->user->id == $id) 
		{
			$response = view('users.show');
		}
		return view('errors.error', ['title' => '找不到页面', 'error' => '没有找到您访问的页面！']);
    }

    /**
     * 显示编辑用户的表单
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
		$user = User::find($id);
		if (empty($user)) $user = $this->user;

		// 已通过统一身份认证的字段禁止修改
		$readonly = '';
		// 提示文本
		$tip = '';
		if ($user->state != 'register')
		{
			$readonly = 'readonly';
		}
		else
		{
			$tip = '<strong>提交成功！</strong>志愿者将在<strong>三个工作日</strong>内予以审核，届时我们将以邮件的形式通知到您，请耐心等待，及时查收！';
		}
		return view('users.edit', compact('user', 'readonly', 'tip'));
    }

    /**
     * 存储修改的用户信息
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
		$old = $this->user->toArray();
		$except = array();

		$user = User::findOrFail($id);

		$registerState = $user->state;

		if ($user->state != 'register') 
		{
			// 若已通过统一身份认证，禁止修改以下字段
			if (!empty($old['name']))
				$except[] = 'name';
			if (!empty($old['gender']))
				$except[] = 'gender';
			if (!empty($old['school']))
				$except[] = 'school';
			if (!empty($old['student_id']))
				$except[] = 'student_id';
			if (!empty($old['student_type']))
				$except[] = 'student_type';
			if (!empty($old['department']))
				$except[] = 'department';
			if ($user->state == 'auth')
				$user->state = 'normal';
		}
		$user->update($request->except($except));
		return redirect()->action('IndexController@redirect');

    }

	public function destroy($id) 
	{
		User::destroy($id);
	}
}
