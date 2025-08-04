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

                            <!-- <div class="mb-3">
                                    <label for="numero_final" class="form-label">Cartão Final</label>
                                    <input type="text" class="form-control" name="numero_final" id="numero_final"
                                        value="{{ old('numero_final') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="anuidade" class="form-label">Anuidade (R$)</label>
                                    <input type="text" class="form-control" name="anuidade" id="anuidade"
                                        value="{{ old('anuidade') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="melhor_dia_compra" class="form-label">Melhor dia para compra</label>
                                    <input type="text" class="form-control" name="melhor_dia_compra"
                                        id="melhor_dia_compra" value="{{ old('melhor_dia_compra') }}">
                                </div> -->
                        </div>

                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection