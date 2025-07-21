<?php

namespace App\Http\Controllers\Validators\Cards;

use App\Http\Controllers\Validators\CommomValidator;

class UpdateCardValidator extends CommomValidator
{
    public function __construct()
    {
        $this->rules();
    }

    public function rules() 
    {
        $this->rules =  [
            'id'                => 'required|uuid|exists:cards,id',
            'nome'              => 'required|max:100',
            'numero_final'      => 'nullable|max:4',
            'anuidade'          => 'required|numeric',
            'ativo'             => 'nullable',
            'is_compartilhado'  => 'nullable',
            'melhor_dia_compra' => 'required|numeric',
        ];
    }
}
