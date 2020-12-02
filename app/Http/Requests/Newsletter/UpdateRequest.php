<?php

namespace App\Http\Requests\Newsletter;

use Carbon\Carbon;
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
            'title' => 'required|min:2|max:140',
            'body' => 'required'
        ];
    }

    public function persist()
    {
        $newsletter = $this->route('newsletter');

        $newsletter->update([
            'title' => $this->title,
            'body' => $this->body,
            'triggerdate' => new Carbon($this->triggerdate),
        ]);
    }
}
