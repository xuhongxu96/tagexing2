<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Illuminate\Http\Response;

class RentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(User $user)
    {
		return $user->auth & \Config::get('admin.adminRent');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'comment' => 'max:500',
        ];
    }

	/**
	 * 权限错误
	 *
	 * @return Response
	 */
	public function forbiddenResponse() 
	{
		return new Response(view('errors.error', ['title' => '权限不足', 'error' => '您的权限不足以编辑该用户的信息！']), 403);
	}
}
