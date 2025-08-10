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
                    {{ __('Nova Conta') }}
                    <div>
                        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}" role="button">Voltar</a>
                    </div>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('cards.contas.store', ['card_id' => $card_id]) }}">
                        @csrf
                        <div class="col-6">
                            <div class="mb-3">
                                <select class="form-select" aria-label="user_id" name="user_id" id="user_id">
                                    <option selected>Seleciona um usuário</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}" @selected(old("user_id") == $usuario->id)>{{ $usuario->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" name="descricao" id="descricao"
                                    value="{{ old('descricao') }}">
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="dia_compra" class="form-label">Dia da compra</label>
                                    <select class="form-select" aria-label="dia_compra" name="dia_compra" id="dia_compra">
                                        <option selected>Dia</option>
                                        @foreach(dias_do_mes() as $dia)
                                        <option value="{{ $dia }}">{{ $dia }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="mes_compra" class="form-label">Mês da compra</label>
                                    <select class="form-select" aria-label="mes_compra" name="mes_compra" id="mes_compra">
                                        <option selected>Mês</option>
                                        @foreach(meses_do_ano() as $key => $mes)
                                        <option value="{{ $key }}">{{ $mes }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="ano_compra" class="form-label">Ano da compra</label>
                                    <select class="form-select" aria-label="ano_compra" name="ano_compra" id="ano_compra">
                                        <option selected>Ano</option>
                                        @foreach(range_ano() as $ano)
                                        <option value="{{ $ano }}">{{ $ano }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="qtd_parcelas" class="form-label">Quantidade de parcelas</label>
                                <input type="text" class="form-control" name="qtd_parcelas" id="qtd_parcelas"
                                    value="{{ old('qtd_parcelas') }}">
                            </div>

                            <div class="mb-3">
                                <label for="valor" class="form-label">Valor</label>
                                <input type="text" class="form-control" name="valor" id="valor"
                                    value="{{ old('valor') }}">
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection