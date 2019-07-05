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
        <a href="/produto/cadastrar" class="btn btn-success">
            Cadastrar Produto
        </a>
    </p>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($produtos->isEmpty())

            <div class="alert alert-danger" role="alert">
                Você não tem produto cadastrado!
            </div>
            @else
            <div class="card">
                <div class="card-header">Listagem de produtos</div>
                <table class="table table-striped table-bordered table-hover">
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Valor unitário</td>
                    <td>Quantidade em estoque</td>
                    <td>Situação</td>
                    <td>Ações</td>
                    @foreach ($produtos as $produto)
                    <tr >
                        <td>{{$produto->id}} </td>
                        <td>{{$produto->nome}} </td>
                        <td>{{$produto->valor_unitario}} </td>
                        <td>{{$produto->quantidade_estoque}} </td>
                        <td>@if($produto->situacao == 1) 
                            Disponível
                            @else
                            Indisponível
                            @endif
                        </td>
                        <td>
                            <a href="/produto/editar/{{$produto->id}}" class="btn btn-primary">
                                Editar
                            </a>
                            <a href="/produto/excluir/{{$produto->id}}" class="btn btn-danger">
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


