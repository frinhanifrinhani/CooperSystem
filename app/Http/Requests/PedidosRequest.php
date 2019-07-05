<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidosRequest extends FormRequest
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
            'produto_id' => 'required',
            'quantidade' => 'required|numeric',
            'valor_unitario' => 'required|numeric', 
            'solicitante' => 'required',
            'cep' => 'required|numeric|min:8',
            'uf' => 'required|min:2',
            'municipio' => 'required',
            'bairro'=> 'required',
            'rua' => 'required',
            'numero' => 'required|numeric',
            'complemento' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'produto_id.required' => 'O campo produto deve ser preenchido',
            'quantidade.required' => 'O campo :attribute deve ser preenchido',
            'quantidade.numeric' => 'O campo :attribute deve ser preenchido com valor númerico',
            'valor_unitario.required' => 'O campo :attribute deve ser preenchido',
            'valor_unitario.numeric' => 'O campo :attribute deve ser preenchido com valor númerico',
            'solicitante.required' => 'O campo :attribute deve ser preenchido',
            'cep.required' => 'O campo :attribute deve ser preenchido',
            'cep.numeric' => 'O campo :attribute deve ser preenchido com valor númerico',
            'cep.min' => 'O campo :attribute deve ser preenchido com 8 caracteres númericos',
            'uf.required' => 'O campo :attribute deve ser preenchido',
            'uf.min' => 'O campo :attribute deve ser preenchido as duas letras refente a sigra do UF',
            'municipio.required' => 'O campo :attribute deve ser preenchido',
            'bairro.required' => 'O campo :attribute deve ser preenchido',
            'rua.required' => 'O campo :attribute deve ser preenchido',
            'numero.required' => 'O campo :attribute deve ser preenchido',
            'numero.numeric' => 'O campo :attribute deve ser preenchido com valor númerico',
            'complemento.required' => 'O campo :attribute deve ser preenchido',
        ];
    }
}
