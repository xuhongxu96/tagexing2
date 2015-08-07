<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
		if ($user->state != 'register')
			$readonly = 'readonly';
		return view('users.edit', compact('user', 'readonly'));
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
		}
		$user->update($request->except($except));
		return redirect()->action('UsersController@edit', compact('id'));
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
