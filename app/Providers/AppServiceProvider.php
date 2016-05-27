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
			$authUser = session('wechat.oauth_user');

			if (app()->environment('debug')) 
			{
				$authUser = (object)array(
					'openid' => 'Hello, World!'
				);
			}

			if (empty($authUser)) 
			{
                $user = $app->oauth->user();
                if (empty($user)) {
                    $response = $app->oauth->scopes(['snsapi_base'])->redirect();
                    $response->send();
                }
				// 保存Session
                $authUser = $app->oauth->user();
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
