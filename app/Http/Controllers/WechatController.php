<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


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
	public function serve() 
	{
        $wechat = app('wechat');
        $server = $wechat->server;

	    $wechat->server->setMessageHandler(function($message){
			return <<<EOT
欢迎关注踏鸽行公共自行车！
EOT;
        });

        $menu = $wechat->menu;
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
