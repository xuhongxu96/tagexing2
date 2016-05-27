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
	public function serve(Server $server, Application $app) 
	{

		$server->on('event', 'subscribe', function ($event) {
			$url = action('IndexController@redirect');
			return <<<EOT
欢迎关注踏鸽行公共自行车！
EOT;
		});

		$server->on('message', 'text', function ($message) {
			$url = action('IndexController@redirect');
		//	switch ($message->Content)
		});

        $menu = $app->menu;
        $buttons = [
            [
                "type" => "click",
                "name" => "踏鸽行",
                "url"  => action('IndexController@redirect')
            ],
        ];
        $menu->add($buttons);

		return $server->serve();
	}

}
