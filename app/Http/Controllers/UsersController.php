<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use App\User;
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
		$this->user = $user;
	}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示注册用户的表单
     *
     * @return Response
     */
    public function create()
    {
		return view('users.create')->withUser($this->user);
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
		$response = view('errors.error', ['title' => '找不到页面', 'error' => '没有找到您访问的页面！']);
		if ($this->user->id == $id)
		{
			// 查看个人信息
			$response = view('index.profile')->withUser($this->user);
			// 获取系统公告
			Cache::forever('tip', [
				'type' => 'info',
				'message' => '踏鸽行 2.0 正在研发中……',
			]);
			// 系统公告每个会话提示3次
			$tipShown = session('tip_shown', 0);
			if ($tipShown < 3)
			{
				session(['tip_shown' => $tipShown + 1]);
				$response->withTip(Cache::get('tip'));
			}
		}
		else if ($this->user->auth)
		{
			// TODO: 管理员查看用户信息
			$response = view('users.show');
		}
		return $response;
    }

    /**
     * 显示编辑用户的表单
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
		// 判断权限
		// TODO: 加入管理员判断
		if ($this->user->id != $id) {
			return view('errors.error', ['title' => '权限不足', 'error' => '您的权限不足以编辑该用户的信息！']);
		}

		$user = User::findOrFail($id);

		// 已通过统一身份认证的字段禁止修改
		$readonly = '';
		// 提示文本
		$tip = '';
		if ($user->state != 'register')
			$readonly = 'readonly';
		else
			$tip = '<strong>提交成功！</strong>志愿者将在<strong>三个工作日</strong>内予以审核，届时我们将以邮件的形式通知到您，请耐心等待，及时查收！';
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
		return redirect()->action('WechatController@redirect');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
