@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.menu')
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
                                        <th scope="col">Compartilhado</th>
                                        <th scope="col">Data Expiração</th>
                                        <th scope="col">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cards as $card)
                                        <tr>
                                            <td scope="row">{{ $card->nome }}</td>
                                            <td scope="row">{{ $card->is_compartilhado }}</td>
                                            <td scope="row">{{ $card->data_expiracao }}</td>
                                            <td scope="row"></td>
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
