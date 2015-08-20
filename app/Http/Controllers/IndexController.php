<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Overtrue\Wechat\Server;

use App\User;
use App\Rank;
use App\Stop;
use App\Score;
use Cache;
use DB;
use \Carbon\Carbon;

class IndexController extends Controller
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
	 * 跳转网页
	 *
	 * @return App\Http\Requests
	 */
	public function redirect() 
	{
		switch ($this->user->state) {
		case 'normal':
		case 'rented':
		case 'disabled':
			return redirect()->action('IndexController@profile');
		case 'register':
		case 'auth':
		case null:
			// 待注册
			return redirect()->action('RegisterController@index');
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
			return redirect()->action('IndexController@redirect');
		}
		// 查看个人信息
		$response = view('index.profile')->with('user', $this->user);
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
			$response->with('tip', Cache::get('tip'));
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

		switch ($this->user->state)
		{
		case 'normal':
			$rent = $this->user->rent()->lastRent()->first();
			$return = $this->user->rent()->lastReturn()->first();
			if ($return && $return->created_at->diffInMinutes() < 5)
			{
				$response->with('unlockPassword', $rent->password);
				$response->with('lockPassword', $return->password);
			}
			break;
		case 'rented':
			$rent = $this->user->rent()->lastRent()->first();
			if ($rent->created_at->diffInMinutes() < 5)
			{
				// 借车5分钟内可以报告借车问题，直接重新借车
				$response->withReport(true);
			}
			$returnTime = $rent->created_at->addHours($rent->max_time);
			$dateInterval = $returnTime->diff(Carbon::now());
			$response->with('rent', $rent);
			$response->with('returnTime', $returnTime);
			$response->with('interval', $dateInterval);
			break;
		}

		return $response->with('nick', $nick[rand(0, count($nick) - 1)])
						->with('stops', Stop::with('bikes')->get()->sortBy(function($stop){
							return $stop->bikes->count();
						}, null, true));
	}

	public function score()
	{
		return view('index.score')->withScores($this->user->scores);
	}
}
