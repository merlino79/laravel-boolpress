<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=>'required|max:255',
            'content'=>'required|min:3',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
        ];
    }

    public function messages()
    {
      return [
        'title.required' => 'il titolo deve essere obbligatorio',
        'title.max' => 'il testo del titolo deve avere un massimo di :max caratteri',
        'content..required' => 'il contenuto deve essere obbligatorio',
        'content.min' => 'il testo del contenuto deve avere almeno :min caratteri',
        'category_id.exists' => 'La categoria scelta non è peresente',
        'tags.exists' => 'Il tag non è peresente'
      ];
    }
}
