<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Overtrue\Wechat\Server;

class WechatController extends Controller
{

	/**
	 * Response to Wechat Request
	 *
	 * @param Overtrue\Wechat\Server $server
	 *
	 * @return string
	 */
	public function serve(Server $server) {

		$server->on('event', 'subscribe', function ($event) {
			return <<<EOT
欢迎来到imall公益电商平台 和 踏鸽行公共自行车服务平台！

<a href="http://imall365.org">点此开始imall公益电商之旅！</a>
<a href="">点此开始踏鸽行！</a>
EOT;
		});

		$server->on('message', function ($message) {
			return "Hello, World!";
		});

		return $server->serve();
	}
}
