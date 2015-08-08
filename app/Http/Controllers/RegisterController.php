<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;

class RegisterController extends Controller
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
	 * 身份认证
	 *
     * @return Response
     */
    public function index()
    {
		if (empty($this->user->student_id))
		{
			// 显示初始注册页面
			return view('register.index');
		}
		return redirect()->action("UsersController@edit", ['id' => $this->user->id]);
    }
}
