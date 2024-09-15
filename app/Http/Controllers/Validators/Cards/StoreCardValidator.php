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
            'nome'           => 'required|max:100',
            'anuidade'       => 'required|numeric',
            'data_expiracao' => 'required|numeric',
        ];
    }
}
