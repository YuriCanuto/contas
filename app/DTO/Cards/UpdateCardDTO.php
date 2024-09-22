<?php

namespace App\DTO\Cards;

use App\Traits\DTO;
use Illuminate\Support\Facades\Auth;

class UpdateCardDTO
{
    use DTO;

    public string   $id;
    public string   $user_id;
    public string   $nome;
    public ?string  $descricao;
    public float    $anuidade;
    public ?string  $extras;
    public bool     $ativo;
    public bool     $is_compartilhado;
    public int      $data_expiracao;

    /**
     * @param  array  $data
     * @return array
     */
    public function customizar(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
        $data['ativo']   = data_get($data, 'ativo', false);
        $data['is_compartilhado'] = data_get($data, 'is_compartilhado', false);

        return $data;
    }
}
