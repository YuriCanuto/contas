@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.menu')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between align-items-center">
                        {{ __('Editar Card') }}
                        <a class="btn btn-sm btn-primary" href="{{ url()->previous() }}" role="button">Voltar</a>
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

                        <form method="POST" action="{{ route('cards.update', ['card_id' => $card->id]) }}">
                            @method('PUT')
                            @csrf
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome"
                                        value="{{ $card->nome }}">
                                </div>

                                <div class="mb-3">
                                    <label for="anuidade" class="form-label">Anuidade (R$)</label>
                                    <input type="text" class="form-control" name="anuidade" id="anuidade"
                                        value="{{ $card->anuidade }}">
                                </div>

                                <div class="mb-3">
                                    <label for="data_expiracao" class="form-label">Data Expiração</label>
                                    <input type="text" class="form-control" name="data_expiracao" id="data_expiracao"
                                        value="{{ $card->data_expiracao }}">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="ativo"
                                        name="ativo" @checked(old(get_true_ou_false($card->ativo), $card->ativo))>
                                    <label class="form-check-label" for="ativo">Ativo</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="is_compartilhado"
                                        name="is_compartilhado" @checked(old(get_true_ou_false($card->is_compartilhado), $card->is_compartilhado))>
                                    <label class="form-check-label" for="is_compartilhado">Compartilhado</label>
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-between align-items-center mt-3">
                                <button class="btn btn-primary" type="submit">Salvar</button>
                                <button id="btnDeletar" type="button" class="btn btn-danger"
                                    url="{{ route('cards.delete', ['card_id' => $card->id]) }}"
                                    urlCallback="{{ route('cards.listar') }}">Deletar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
