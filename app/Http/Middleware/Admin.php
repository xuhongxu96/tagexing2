<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Admin
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
        if (!$this->user->auth) {
			return response(view('errors.error', ['title' => '权限不足', 'error' => '需要管理员权限！']), 403);
        }
        return $next($request);
    }
}
