<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;

class AuthController extends Controller
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
	 * 跳转认证页面
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function auth(Request $request)
	{
		switch($request->input('school'))
		{
		case '北京师范大学':
			return redirect()->action('AuthController@bnu');
			break;
		}
	}
	/**
	 * 北京师范大学统一身份认证
	 * 
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function bnu(Request $request)
	{
		//CAS Server的登陆URL
		$loginServer = "http://cas.bnu.edu.cn/cas/login";
		//CAS Server的验证URL
		$validateServer = "http://cas.bnu.edu.cn/cas/serviceValidate";

		//当前集成系统所在的URL
		$thisCas = action('AuthController@bnu');

		//判断是否有验证成功后需要跳转页面，如果有，增加跳转参数
		if($request->has("redirectUrl")) {
			$thisCas = $thisCas."?redirectUrl=".$request->input["redirectUrl"];
		}

		//判断是否已经登录
		if($request->has("ticket")) {
			//获取登录后的返回信息
			$validateurl = $validateServer."?ticket=".$request->input("ticket")."&service=".$thisCas;
			$validateResult = file_get_contents($validateurl);

			//节点替换，去除sso:，否则解析的时候有问题
			$validateResult = preg_replace("/sso:/","",$validateResult);
			$validateXML = simplexml_load_string($validateResult, "SimpleXMLElement", 0, "cas", true);

			//获取验证成功节点
			$successnode = $validateXML->authenticationSuccess[0];
			if(!empty($successnode)){
				//实现登录完毕
				//存储认证信息
				$this->user->school = "北京师范大学";
				$this->user->student_id = $successnode->attributes->ID_NUMBER;
				$this->user->gender = $successnode->attributes->USER_SEX == 1 ? 'male' : 'female';
				$this->user->name = $successnode->attributes->USER_NAME;
				$this->user->department = $successnode->attributes->UNIT_NAME;
				$this->user->student_type = $successnode->attributes->TYPE_NAME;
				$this->user->state = 'auth';
				$this->user->save();
				return redirect()->action("RegisterController@details");
				
			}else{
				//重定向浏览器 
				return redirect()->to($loginServer . '?service=' . $thisCas);
			}
		}else{
			//重定向浏览器 
			return redirect()->to($loginServer . '?service=' . $thisCas);
		}
	}
}
