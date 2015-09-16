<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Overtrue\Wechat\Server;
use Overtrue\Wechat\Media;
use Overtrue\Wechat\Message;

use App\User;
use App\Rank;
use App\Stop;
use Cache;
use Config;
use DB;

class WechatController extends Controller
{

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
			$url = action('IndexController@redirect');
			return <<<EOT
欢迎关注imall社区公益！
这是一个温暖而有力量的平台，因为这里有imall公益电商和踏鸽行校园公共自行车。
我们不仅服务师大，温暖校园，更倡导公益的理念与环保的生活方式。
关注我们，加入我们，你就是师大公益的见证者与参与者！
 
1. 想了解imall慈善商店，请回复 1 获取imall简介。
2. 想报名加入imall，请回复 2 获取imall报名表。
3. 想了解imall调研情况，请回复 3 获取imall调研表单。
4. 想报名加入“踏鸽行”，请回复 4 获取踏鸽行报名表。
5. 想了解更多“踏鸽行”相关，请回复 5 获取踏鸽行交流群二维码。
 
快来开启你崭新的公益之旅吧！
EOT;
		});

		$server->on('message', 'text', function ($message) {
			$url = action('IndexController@redirect');
			switch ($message->Content)
			{
			case "1":
			return <<<EOT
imall，北师大社区慈善商店。www.imall365.org是我们的网站（即将面临改版）。
欢迎关注我们的微信号”imall_dreammore”。
【我们立志于】
让大家不再对着满屋子的闲置物品发愁，让捐赠产生价值，让北师大成为人人由互助意识的美好社区。
项目运营所得利润将用于支持大家的“校园梦想”。目前正在支持“踏鸽行”校园公共自行车项目运营。
【我们的日常工作内容】
活动策划、宣传策划、微信管理、给商品拍美照、外场做宣传、与捐赠人/客户沟通……要体验，这里都有！
【如果你加入，你将收获】
1.  每周一次各种技能的学习机会；
2.  志愿证明、实习证明；
3.  “志愿北京”官方网站的志愿服务时长记录；
4.  结识一群志同道合的优秀伙伴、前辈；
5.  最重要的，imall会助你成长，让你的大学与众不同。
EOT;
				break;
			case "2":
			return <<<EOT
<a href="https://jinshuju.net/f/z0GASP">imall报名</a>
EOT;
				break;
			case "3":
			return <<<EOT
<a href="https://jinshuju.net/f/5uQ0Nn">imall调研</a>
EOT;
				break;
			case "4":
			return <<<EOT
<a href="https://jinshuju.net/f/tKROez">踏鸽行报名</a>
EOT;
				break;
			case "5":
				$media = new Media(Config::get('wechat.app_id'), Config::get('wechat.secret'));
				$imageId = $media->image(__DIR__ . '/qr.jpg'); // 上传并返回媒体ID

				return Message::make('image')->media($imageId);
				break;
			}
		});

		return $server->serve();
	}

}
