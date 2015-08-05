<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Overtrue\Wechat\Servre;

class WechatController extends Controller
{

	public function serve(Server $server) {
		$server->on('message', function ($message) {
			return "Hello, World!";
		});

		return $server;
	}
}
