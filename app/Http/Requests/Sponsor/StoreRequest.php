<?php

namespace App\Http\Requests\Sponsor;

use App\Models\Sponsor;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'image' => 'required|image|max:10000',
        ];
    }

    public function persist()
    {
        $sponsor = Sponsor::forceCreate($this->only('name', 'url'));
        return $sponsor;
    }
}
