<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Overtrue\Wechat\Server;

use App\User;
use Auth;

class WechatController extends Controller
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
	 * 响应微信请求
	 *
	 * @param Overtrue\Wechat\Server $server
	 *
	 * @return string
	 */
	public function serve(Server $server) 
	{

		$server->on('event', 'subscribe', function ($event) {
			$url = action('WechatController@auth');
			return <<<EOT
欢迎来到imall公益电商平台 和 踏鸽行公共自行车服务平台！

<a href="http://imall365.org">点此开始imall公益电商之旅！</a>
<a href="$url">点此开始踏鸽行！</a>
EOT;
		});

		$server->on('message', function ($message) {
			return "Hello, World!";
		});

		return $server->serve();
	}

	/**
	 * 微信认证并跳转网页
	 *
	 * @return App\Http\Requests
	 */
	public function redirect() 
	{
		switch ($this->user->state) {
		case 'normal':
			break;
		case 'rented':
			break;
		case 'disabled':
			break;
		case 'register':
		default:
			// 待注册
			return redirect()->action('RegisterController@index');
			break;
		}
		
		return 'Invalid Parameter';
	}
	/**
	 * Index Page for Wechat
	 *
	 * @return View
	 */
	public function index() {
	}
}
