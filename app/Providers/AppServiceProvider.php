<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Overtrue\Wechat\Auth;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

		$this->app->singleton('App\User', function ($app) {
			// Session中获取当前认证用户
			$authUser = session('logged_user');

			if (app()->environment('debug')) {
				$authUser = (object)array(
					'openid' => 'Hello, World!'
				);
			}

			if (empty($authUser)) {
				// 获取微信认证接口
				$auth =\App::make('Overtrue\Wechat\Auth');
				// 若Session为空，则进行微信认证
				$authUser = $auth->authorize(null, 'snsapi_base'); 
				// 保存Session
				session(['logged_user' => $authUser]);
			}

			// 根据认证得到的用户openid获取用户信息，若不存在则实例化新用户
			return User::firstOrNew(['openid' => $authUser->openid]);
		});
    }
}
