@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar Pedido</div>
                <p>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                          <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                          </ul>
                    </div>
                    @endif
                <div class="container col-md-10">
                    <form action="/pedido/atualizar" method="post">
                        @foreach ($pedido as $pedido => $key)
                        <input type="hidden" name="_token" value="{{{csrf_token()}}}" >
                        <input type="hidden" name="id" value="{{ $key->id }}" >
                        <div class="form-group">
                            <label>Produto</label>
                            <select class="form-control" name="produto_id">
                                <option selected="selected" value="{{ $key->produto_id }}">{{ $key->nome }}</option>
                                    @foreach($produtos as $produto)
                                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Quantidade</label>
                            <input name="quantidade" value="{{ $key->quantidade }}" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Valor Unitário</label>
                            <input name="valor_unitario" value="{{ $key->valor_unitario }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Solicitante</label>
                            <input name="solicitante" value="{{ $key->solicitante }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>CEP</label>
                            <input name="cep" value="{{ $key->cep }}" maxlength="8" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>UF</label>
                            <input name="uf" value="{{ $key->uf }}" maxlength="2"class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Município</label>
                            <input name="municipio" value="{{ $key->municipio }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Rua</label>
                            <input name="rua" value="{{ $key->rua }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Número</label>
                            <input name="numero" value="{{ $key->numero }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Complemento</label>
                            <input name="complemento" value="{{ $key->complemento }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Bairro</label>
                            <input name="bairro" value="{{ $key->bairro }}" class="form-control">
                        </div>
                        <div  class="container col-md-2">
                            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                        </div>
                        @endforeach
                    </form>
                </div>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection  

