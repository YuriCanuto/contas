@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    {{ __('Contas') }}
                    <div>
                        <a class="btn btn-sm btn-link" href="{{ $url_mes_anterior }}"><<</a>
                        <span><b>{{ $mes_atual }}</b></span>
                        <a class="btn btn-sm btn-link" href="{{ $url_proximo_mes }}">>></a>
                    </div>
                    <div>
                        <span>Valor Total: <b>{{ $valor_total }}</b></span>
                    </div>
                    <div>
                        <a class="btn btn-sm btn-success" href="{{ route('cards.listar') }}" role="button">Voltar</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('cards.contas.novo', ['card_id' => $card_id]) }}" role="button">Nova Conta</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Parcela</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Responsavel</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contas as $conta)
                                <tr>
                                    <td scope="row">{{ $conta->descricao }}</td>
                                    <td scope="row">{{ $conta->parcela }}</td>
                                    <td scope="row">{{ $conta->valor }}</td>
                                    <td scope="row">{{ $conta->responsavel->nome }}</td>
                                    <td scope="row">{!! $conta->status !!}</td>
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