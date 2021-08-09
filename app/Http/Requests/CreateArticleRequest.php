<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
            'nom' => ['required', 'string', 'max:30'],
            'prix' => ['required'],
            'qte_stock' => ['required'],
            'photo1' => ['required','image'],
            'photo2' => ['required','image'],
            'description' => ['required', 'string', 'max:255'],
        ];
    }
}
