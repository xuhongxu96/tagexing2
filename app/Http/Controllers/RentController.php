<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Stop;
use App\Bike;
use App\Rank;
use App\Rent;
use App\Tools\OTPCheck;
use \Carbon\Carbon;
use Cache;

class RentController extends Controller
{

	protected $user;

	/**
	 * Constructor
	 *
	 * @param App\User $user
	 */
	public function __construct(User $user)
	{
		$this->middleware('normal');
		$this->user = $user;
	}

	public function getStops()
	{
		return view('index.stops')->withType('rent')
			->withAction('RentController@getBikes')
			->withStops(Stop::with('bikes')->get()->sortBy(function($stop){
				return $stop->bikes->count();
			}, null, true));
	}

	public function getBikes($stopId)
	{
		$stop = Stop::find($stopId);
		return view('rent.bikes')->withStop($stop)
								 ->withBikes($stop->bikes);
	}

	public function getCode($stopId, $bikeId)
	{
		$type = 'rent';
		return view('index.code', compact('type', 'stopId', 'bikeId'));
	}

	public function postRent(Request $request, $stopId, $bikeId)
	{
		if (OTPCheck::check(Stop::find($stopId)->code, $request->input('code')))
		{
			$bike = Bike::find($bikeId);
			if ($stopId != $bike->stop_id) return view('errors.error')->withTitle('借车失败')->withError('该车不在您选定的车站，请重试！');
			$stop = Stop::find($stopId);
			$rank = Rank::fromScore($this->user->score)->first();

			// 检查车辆状态
			if ($bike->state == 'rented')
			{
					return view('errors.error')->withTitle('借车失败')->withError('真不巧，这辆车已被其他童鞋抢先借出。');
			}
			else if ($bike->state != 'normal')
			{
					return view('errors.error')->withTitle('借车失败')->withError('对不起，这辆车已经报修，请重新选择车辆。');
			}

			// 本次借车与上次还车时间间隔应当在20分钟以上
			$lastRent = $this->user->rent()->lastReturn()->first();
			if ($lastRent)
			{
				$diffMinutes = $lastRent->created_at->diffInMinutes(Carbon::now());
				if ($diffMinutes < 20)
				{
					return view('errors.error')->withTitle('借车失败')->withError('本次借车与上次还车时间间隔应在20分钟以上（含20分钟），您还需等待 ' . (20 - $diffMinutes) . ' 分钟');
				}
			}

			// 记录Rent
			$rent = new Rent();
			$rent->type = 'rent';
			$rent->user_id = $this->user->id;
			$rent->max_time = Cache::get('special_time', false) ? $rank->max_time_special : $rank->max_time;
			$rent->bike_id = $bikeId;
			$rent->stop_id = $stopId;
			$rent->password = $bike->password;
			$rent->save();

			// 更新user
			$this->user->state = 'rented';
			$this->user->save();

			// 更新bike
			$bike->state = 'rented';
			$bike->stop_id = null;
			$bike->save();

			// 成功
			return view('rent.success')
					->withPassword($rent->password);
		}
		else
		{
			return view('errors.error')->withTitle('车站码错误')->withError('请输入正确的车站动态码。车站码位于车站站牌证明，轻按按钮即可显示。');
		}
	}

}
