<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Illuminate\Http\Response;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(User $user)
    {
		return (empty($user->id) && empty($this->route('users'))) || ($user->id == $this->route('users'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'name' => 'required|max:100',
			'gender' => 'required|in:male,female',
			'email' => 'required|email|max:300',
			'mobile' => 'required|digits:11',
			'qq' => 'numeric',
			'school' => 'required|max:100',
			'student_id' => 'required|digitsbetween:1,100',
			'student_type' => 'required|max:300',
			'department' => 'max:300',
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
