@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="list-group">
                        <a href="/produto/listar" class="list-group-item list-group-item-action">Produtos</a>
                        <a href="/pedido/listar" class="list-group-item list-group-item-action">Pedidos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
