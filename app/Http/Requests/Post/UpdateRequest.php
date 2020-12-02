<?php

namespace App\Http\Requests\Post;

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
        return \Gate::allows('update', $this->route('post'));
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

    /**
     * Update a post.
     */
    public function persist()
    {
        $post = $this->route('post');
        $post->update($this->only('title', 'body'));

        if ($post->drafted_at != null) {
            if ($this->get('_action') == 'Publiceren') {
                $post->update([
                    'drafted_at' => null,
                ]);
            } else {
                if ($this->get('_action') == 'Opslaan als concept') {
                    $post->update([
                        'drafted_at' => Carbon::now(),
                    ]);
                }
            }
        }

        return $post;
    }
}
