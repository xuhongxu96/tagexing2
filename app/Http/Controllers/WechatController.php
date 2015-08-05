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
		$server->on('message', function ($message) {
			return "Hello, World!";
		});

		return $server->serve();
	}
}
