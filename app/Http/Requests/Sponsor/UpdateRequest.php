<?php

namespace App\Http\Requests\Sponsor;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|min:2|max:200',
            'url' => 'required|url',
            'image' => 'image|max:10000',
        ];
    }

    public function persist()
    {
        $sponsor = $this->route('sponsor');

        $sponsor->update($this->only('name', 'url'));

        return $sponsor;
    }
}
