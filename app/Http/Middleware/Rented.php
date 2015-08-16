<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Rented
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
        if ($this->user->state != 'rented') {
			$tip = [
				'normal' => '待审核',
				'auth' => '待完善注册信息',
				'normal' => '待借车',
				'rented' => '已借车',
				'disabled' => '禁用',
			];
			return response(view('errors.error', ['title' => '权限不足', 'error' => '您当前处于 ' . $tip[$this->user->state] . ' 状态，不能进行此操作。']), 403);
        }
        return $next($request);
    }
}
