<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Overtrue\Wechat\Server;

use App\User;
use App\Rank;
use App\Stop;
use Cache;
use DB;

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
			return redirect()->action('WechatController@profile');
			break;
		case 'rented':
			break;
		case 'disabled':
			break;
		case 'register':
		case 'auth':
		case null:
			// 待注册
			return redirect()->action('RegisterController@index');
			break;
		}
		
		return 'Invalid Parameter';
	}
	/**
	 * 个人信息
	 *
	 * @return View
	 */
	public function profile() {
		if (empty($this->user->state)) 
		{
			return redirect()->action('WechatController@redirect');
		}
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
		// 随机昵称
		$nick = ['童鞋', '小盆友', '小伙伴', '小公举'];

		if (in_array($this->user->state, ['normal', 'rented', 'disabled'])) 
		{
			if ($this->user->gender == 'male')
				$nick = array_merge($nick, ['小帅哥', '大哥哥', '汉纸']);
			else
				$nick = array_merge($nick, ['小公主', '大美女', '女神']);
			if (preg_match('/(信息|计算机|软件)/', $this->user->department))
			{
				$nick = array_merge($nick, ['程序猿', '工程狮']);
				if ($this->user->gender == 'male')
					$nick = array_merge($nick, ['好男人']);
				else
					$nick = array_merge($nick, ['程序媛']);
			}

			$response->withRank(Rank::fromScore($this->user->score)->first());
		}


		return $response->withNick($nick[rand(0, count($nick) - 1)])
						->withStops(Stop::with('bikes')->get()->sortBy(function($stop){
							return $stop->bikes->count();
						}, null, true));
	}
}
