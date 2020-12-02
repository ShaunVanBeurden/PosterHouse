<?php

namespace App\Http\Requests\Alias;

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
            'name' => 'required|min:2|max:170',
            'unit' => [
                'required',
                Rule::exists('units', 'id')
            ]
        ];
    }

    /**
     * Update the alias of an unit.
     */
    public function persist()
    {
        $this->route('alias')->update([
            'name' => $this->name,
            'unit' => $this->unit,
        ]);
    }
}
