@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.menu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    {{ __('Cards') }}
                    <a class="btn btn-sm btn-primary" href="{{ route('cards.novo') }}" role="button">Novo Card</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Final</th>
                                    <th scope="col">Ativo</th>
                                    <th scope="col">Compartilhado</th>
                                    <th scope="col">Melhor dia</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cards as $card)
                                <tr>
                                    <td scope="row">{{ $card->nome }}</td>
                                    <td scope="row">{{ $card->numero_final }}</td>
                                    <td scope="row">{!! $card->ativado !!}</td>
                                    <td scope="row">{!! $card->compartilhado !!}</td>
                                    <td scope="row">{{ $card->melhor_dia_compra }}</td>
                                    <td scope="row">
                                        <div class="flex justify-content-between align-items-center">
                                            <a href="{{ route('cards.editar', ['card_id' => $card->id]) }}"
                                                type="button" class="btn btn-primary btn-sm">Editar</a>

                                            <a href="{{ route('cards.contas.listar', ['card_id' => $card->id]) }}"
                                                type="button" class="btn btn-success btn-sm">Contas</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection