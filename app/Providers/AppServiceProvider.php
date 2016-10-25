<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Overtrue\Wechat\Auth;
use App\User;
use \Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

		$this->app->singleton('App\User', function ($app) 
		{
			// Session中获取当前认证用户
			$authUser = session('logged_user');

			if (true || app()->environment('debug')) 
			{
				$authUser = (object)array(
					'openid' => 'Hello, World!'
				);
			}

			if (empty($authUser)) 
			{
				$oauth = app('wechat')->oauth;
				try{
					$authUser = $oauth->user();
				}catch(\InvalidArgumentException $e) {
				    $response = $oauth->scopes(['snsapi_base'])->redirect();
				    return $response;
				}
				// 保存Session
				//$authUser = $oauth->user();
				session(['logged_user' => $authUser]);
			}

			// 根据认证得到的用户openid获取用户信息，若不存在则实例化新用户
			$user = User::firstOrNew(['openid' => $authUser->id]);
			if ($user->state == 'normal' && $user->score <= 0)
			{
				$user->state = 'disabled';
				$user->save();
			}
			else if ($user->score > 0 && $user->state == 'disabled' && $user->free_at && $user->free_at->lte(Carbon::now()))
			{
				$user->state = 'normal';
				$user->save();
			}
			return $user;
		});
    }
}
