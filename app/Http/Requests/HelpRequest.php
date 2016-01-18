<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Illuminate\Http\Response;

class HelpRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(User $user)
    {
		return $user->auth & \Config::get('admin.adminHelp');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'type' => 'required|in:caption,link',
			'title' => 'required|max:200',
			'class' => 'max:500',
			'page_title' => 'max:10',
			'item_order' => 'required|numeric',
			'content' => 'max:3000',
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
