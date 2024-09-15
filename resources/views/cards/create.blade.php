@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.menu')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between align-items-center">
                        {{ __('Novo Card') }}
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

                        <form method="POST" action="{{ route('cards.store') }}">
                            @csrf
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="anuidade" class="form-label">Anuidade (R$)</label>
                                    <input type="text" class="form-control" name="anuidade" id="anuidade">
                                </div>

                                <div class="mb-3">
                                    <label for="data_expiracao" class="form-label">Data Expiração</label>
                                    <input type="text" class="form-control" name="data_expiracao" id="data_expiracao">
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
