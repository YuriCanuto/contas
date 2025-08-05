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
            'user_id'      => 'required|uuid',
            'card_id'      => 'required|uuid',
            'descricao'    => 'required|max:30',
            'qtd_parcelas' => 'required',
            'valor'        => 'required|decimal:2',
            'data_compra'  => 'required|date_format:d/m/Y',
        ];
    }
}
