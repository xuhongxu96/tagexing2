<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tools\OTPCheck;

use App\User;
use App\Stop;
use App\Bike;
use App\Rent;
use App\Score;
use \Carbon\Carbon;

class ReturnController extends Controller
{
	protected $user;

	/**
	 * Constructor
	 *
	 * @param App\User $user
	 */
	public function __construct(User $user)
	{
		$this->middleware('rented');
		$this->user = $user;
	}

	public function getStops()
	{
		return view('index.stops')->withType('return')
			->withAction('ReturnController@getCode')
			->withStops(Stop::with('bikes')->get()->sortBy(function($stop){
				return $stop->bikes->count();
			}));
	}

	public function getCode($stopId)
	{
		$type = 'return';
		return view('index.code', compact('type', 'stopId'));
	}

	public function postReturn(Request $request, $stopId)
	{
		if (OTPCheck::check(Stop::find($stopId)->code, $request->input('code')))
		{
			$rent = $this->user->rent()->lastRent()->first();
			$bike = $rent->bike;

			// 生成密码
			$password = "";
			for($i = 0; $i < 5; ++$i)
				$password .= rand (0, 9);


			// 修改车辆状态
			if ($bike->state == 'rented')
			{
				$bike->state = 'normal';
			}
			$bike->stop_id = $stopId;
			$bike->password = $password;
			$bike->save();

			// 记录Rent(Return)
			$return = new Rent();
			$return->type = 'return';
			$return->user_id = $this->user->id;
			$return->max_time = $rent->max_time;
			$return->bike_id = $bike->id;
			$return->stop_id = $stopId;
			$return->password = $password;
			$return->save();

			// 更新分值
			$score = new Score();
			$score->user_id = $this->user->id;

			// 分值计算
			$scoreDiff = 0;
			$returnTime = $rent->created_at->addHours($rent->max_time);
			if ($returnTime->lt(Carbon::now()))
			{
				// 超时
				$overHour = $returnTime->diffInHours();
				// 基础扣5分，每2小时多扣1分
				$scoreDiff = -5 - floor($overHour / 2);
				$score->reason = '还车超时' . $overHour . '小时，扣分';
			}
			else
			{
				// 成功还车+2分
				$scoreDiff = 2;
				$score->reason = '成功按时还车！加分';
			}

			$score->score = $scoreDiff;
			$score->save();

			// 更新user
			$this->user->state = 'normal';
			$this->user->score = $this->user->score + $scoreDiff;
			$this->user->total += $rent->created_at->diffInSeconds();
			$this->user->save();

			// 成功
			return view('return.success')
					->withTip($score->reason . $scoreDiff)
					->withPassword($password);
		}
		else
		{
			return view('errors.error')->withTitle('车站码错误')->withError('请输入正确的车站动态码。车站码位于车站站牌证明，轻按按钮即可显示。');
		}
	}

	public function getReport()
	{
		$rent = $this->user->rent()->lastRent()->first();
		if ($rent->created_at->diffInMinutes() < 75)
		{
			// 借车5分钟内可以报告借车问题，直接重新借车
			$lastRent = $rent->bike->rent()->lastRent()->where('id', '!=', $rent->id)->first();
			$password = null;
			if ($lastRent) $password = $lastRent->password;
			return view('return.report')->withPassword($password);
		}
		else
		{
			return view('errors.error')->withTitle('报修错误')->withError('借车后五分钟内才能够报告借车遇到的问题，若您依然无法处理，请直接拨打客服手机：18964087795 18401654098，谢谢合作！');
		}
	}

	public function getLockBroken()
	{
		$rent = $this->user->rent()->lastRent()->first();
		$bike = $rent->bike;

		// 修改借车记录的损坏报告
		$rent->broken_type = 'lock';
		$rent->broken_desp = '上一次的借车密码仍然无效';
		$rent->save();
		
		// 修改车辆状态
		$bike->state = 'broken';
		$bike->stop_id = $rent->stop_id;
		$bike->save();

		// 修改用户状态
		$this->user->state = 'normal';
		$this->user->save();
	}

	public function getLockRepaired()
	{
		$rent = $this->user->rent()->lastRent()->first();

		// 密码还原
		$lastRent = $rent->bike->rent()->lastRent()->where('id', '!=', $rent->id)->first();
		$rent->password = $lastRent->password;
		$rent->save();

		// 上次还车导致损坏
		$lastReturn = $rent->bike->rent()->lastReturn()->first();
		$lastReturn->broken_type = 'lock';
		$lastReturn->broken_desp = '未改密码';
		$lastReturn->save();

		// 上次用户惩罚
		$score = new Score();
		$score->user_id = $lastReturn->user->id;
		$score->reason = '忘改密码';
		$score->score = -5;
		$score->save();
		$lastReturn->user->score -= 5;
		$lastReturn->user->save();
	}

	public function postBikeBroken(Request $request)
	{
		$rent = $this->user->rent()->lastRent()->first();
		$bike = $rent->bike;

		// 修改借车记录的损坏报告
		$rent->broken_type = 'bike';
		$rent->broken_desp = $request->input('description');
		$rent->save();
		
		// 修改车辆状态
		$bike->state = 'broken';
		$bike->stop_id = $rent->stop_id;
		$bike->save();

		// 修改用户状态
		$this->user->state = 'normal';
		$this->user->save();
	}

	public function getAccident()
	{
		return view('index.info')->withTitle('联系我们')->withInfo('请直接拨打客服手机：18964087795 18401654098，并将车辆正常归还！');
	}
}
