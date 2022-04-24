<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title' => 'required | max:15',
            'post' => 'required | min:10'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'Title should not be more than 15 characters.',
            'post.required' => 'The post field is required.',
            'post.min' => 'Post should have atleast 10 characters.',
        ];
    }
}