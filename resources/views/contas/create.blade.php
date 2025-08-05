@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.menu')
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
                                    <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" name="descricao" id="descricao"
                                    value="{{ old('descricao') }}">
                            </div>

                            <div class="mb-3">
                                <label for="data_compra" class="form-label">Data da compra</label>
                                <input type="text" class="form-control" name="data_compra" id="data_compra"
                                    value="{{ old('data_compra') }}">
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