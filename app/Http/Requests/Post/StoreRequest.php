<?php

namespace App\Http\Requests\Post;

use Carbon\Carbon;
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
            'title' => 'required|min:2|max:140',
            'cover' => 'image|max:5000',
            'body' => 'required',
        ];
    }

    public function persist()
    {
        $post = $this->user()->posts()->create($this->only('title', 'body'));

        if ($this->get('_action') == 'Opslaan als concept') {
           $post->update([
               'drafted_at' => Carbon::now(),
           ]);
        }

        return $post;
    }
}
