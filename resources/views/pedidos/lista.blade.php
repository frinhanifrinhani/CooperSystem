@extends('layouts.app')
@section('content')
<div class="container">
     @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }}" role="alert">
                {!! Session::get('alert-' . $msg) !!}
            </div>
        @endif
    @endforeach
    <p>
        <a href="/pedido/cadastrar" class="btn btn-success">
            Cadastrar Pedido
        </a>
    </p>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($pedidos->isEmpty())
            <div class="alert alert-danger" role="alert">
                Você não tem pedido cadastrado!
            </div>
            @else
            <div class="card">
                <div class="card-header">Listagem de Pedidos</div>
                <table class="table table-striped table-bordered table-hover">
                    <td>Id</td>
                    <td>Solicitante</td>
                    <td>Produto</td>
                    <td>Quantidade</td>
                    <td>Valor unitário</td>
                    <td>Data do Pedido</td>
                    <td>CEP</td>
                    <td>UF</td>
                    <td>Endereço</td>
                    <td>Ações</td>
                    @foreach ($pedidos as $pedido => $key)
                    <tr >
                        <td>{{$key->id}} </td>
                        <td>{{$key->solicitante}} </td>
                        <td>{{$key->nome}} </td>
                        <td>{{$key->quantidade}} </td>
                        <td>{{$key->valor_unitario}} </td>
                        <td>{{ \Carbon\Carbon::parse($key->data_pedido)->format('d/m/Y')}} </td>
                        <td>{{$key->cep}} </td>
                        <td>{{$key->uf}} </td>
                        <td>
                            {{ $key->rua }}
                            {{ $key->numero }}
                            {{ $key->complemento }}
                            {{ $key->bairro}}
                            {{ str_limit($key->municipio, $limit = 3, $end = '...') }}
                        </td>
                        <td>
                            <a href="/pedido/editar/{{$key->id}}" class="btn btn-primary">
                                Editar
                            </a>
                            <a href="/pedido/excluir/{{$key->id}}" class="btn btn-danger">
                                Excluir
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection  


