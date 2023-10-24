<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_book' => 'required|max:255',
            'img' => 'image',
            'description' => 'required',
            'price' => 'required',
            'category_id'=>'required',
            'author_id'=>'required',
            'promotion_id'=>'required',
        ];
    }
}