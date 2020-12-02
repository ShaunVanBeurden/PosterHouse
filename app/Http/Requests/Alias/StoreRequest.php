<?php

namespace App\Http\Requests\Alias;

use App\Models\UnitAlias;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => 'required|min:2|max:170',
            'unit' => [
                'required',
                Rule::exists('units', 'id')
            ]
        ];
    }

    /**
     * Create a new unit alias.
     *
     * @return \App\Models\UnitAlias
     */
    public function persist()
    {
        return UnitAlias::create([
            'name' => $this->name,
            'unit_id' => $this->unit,
        ]);
    }
}
