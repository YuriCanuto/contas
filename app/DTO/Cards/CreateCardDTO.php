<?php

namespace App\DTO\Cards;

use App\Traits\DTO;
use Illuminate\Support\Facades\Auth;

class CreateCardDTO
{
    use DTO;

    public string   $user_id;
    public string   $nome;
    public ?string  $numero_final;
    public ?string  $descricao;
    public float    $anuidade;
    public ?string  $extras;
    public bool     $ativo;
    public bool     $is_compartilhado;
    public int      $melhor_dia_compra;

    /**
     * @param  array  $data
     * @return array
     */
    public function customizar(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
        $data['ativo']   = true;
        $data['is_compartilhado'] = true;

        return $data;
    }
}
