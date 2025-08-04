<?php

namespace App\Http\Controllers\Validators\Cards;

use App\Http\Controllers\Validators\CommomValidator;

class StoreCardValidator extends CommomValidator
{
    public function __construct()
    {
        $this->rules();
    }

    public function rules() 
    {
        $this->rules =  [
            'nome'              => 'required|max:100',
            'numero_final'      => 'nullable|max:4',
            'anuidade'          => 'required|numeric',
            'melhor_dia_compra' => 'required|numeric',
        ];
    }
}
