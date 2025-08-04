<?php

namespace App\Http\Controllers\Validators\Contas;

use App\Http\Controllers\Validators\CommomValidator;

class StoreContasValidator extends CommomValidator
{
    public function __construct()
    {
        $this->rules();
    }

    public function rules() 
    {
        $this->rules =  [
            'descricao'   => 'required|max:30',
            'data_compra' => 'required|date_format:d/m/Y',
            'card_id'     => 'required|uuid',
            'user_id'     => 'required|uuid',
        ];
    }
}
