<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Normal
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
        if ($this->user->state != 'normal') {
			return response(view('errors.error', ['title' => '权限不足', 'error' => '您的权限不足！']), 403);
        }
        return $next($request);
    }
}
