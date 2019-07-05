<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
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
            'nome' => 'required|max:80',
            'valor_unitario' => 'numeric',
            'quantidade_estoque' => 'required|numeric',
            //'situacao' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo :attribute deve ser preenchido',
            'valor_unitario.numeric' => 'O campo :attribute deve ser preenchido com um número',
            'quantidade_estoque.required' => 'O campo :attribute deve ser preenchido',
            //'situacao.required' => 'O campo :attribute deve ser preenchido',
        ];
    }
}
