<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:100',
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($this->route('user')->id)
            ],
            'role_id' => 'required|boolean'
        ];
    }

    /**
     * Update the user.
     */
    public function persist()
    {
        $user = $this->route('user');

        $user->update($this->only('name', 'email', 'role_id'));
    }
}
