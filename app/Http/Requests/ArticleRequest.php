<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $rules = [
            'title' => 'required|min:1|max:30',
            'description' => 'required|max:512',
            'price' => 'required|min:0|regex:/^\d*(\.\d{1,2})?$/',
            'quantity' => 'required|min:1|max:10000|integer',
            'category' => 'required|numeric',
        ];

        $numImages = count($this->input('image'));
        foreach (range(0, $numImages) as $index) {
            $rules['image.' . $index] = 'image|max:2048';
        }

        return $rules;
    }
}
