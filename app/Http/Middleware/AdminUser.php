<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AdminUser
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!($this->user->auth & \Config::get('admin.adminUser') || $this->user->auth & \Config::get('admin.adminAuth'))) {
			return response(view('errors.error', ['title' => '权限不足', 'error' => '需要用户管理权限！']), 403);
        }
        return $next($request);
    }
}
