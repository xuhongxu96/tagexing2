<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class Authenticate
{
    /**
     * User
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
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
		// 判断权限
		// TODO: 加入管理员判断
		$id = $request->route('users');
		if (!$request->has('users')) $id = $this->user->id;
        if ($id && $this->user->id != $id) {
			return response(view('errors.error', ['title' => '权限不足', 'error' => '您的权限不足！']), 403);
        }

        return $next($request);
    }
}
