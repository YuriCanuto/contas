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
                        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}" role="button">Voltar</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('cards.contas.novo', ['card_id' => $card_id]) }}" role="button">Nova Conta</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection