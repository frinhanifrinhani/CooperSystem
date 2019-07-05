@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar Pedido</div>
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
                    <form action="/pedido/salvar" method="post">
                        <input type="hidden" name="_token" value="{{{csrf_token()}}}" >
                        <div class="form-group">
                            <div class="form-group">
                                <label>Produto</label>
                                <select class="form-control" name="produto_id">
                                    @foreach($produtos as $produto)
                                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantidade</label>
                            <input name="quantidade" value="{{ old('quantidade') }}" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Valor Unitário</label>
                            <input name="valor_unitario" value="{{ old('valor_unitario') }}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Solicitante</label>
                            <input name="solicitante" value="{{ old('solicitante') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>CEP</label>
                            <input name="cep" value="{{ old('cep') }}" maxlength="8" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>UF</label>
                            <input name="uf" value="{{ old('uf') }}" maxlength="2"class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Município</label>
                            <input name="municipio" value="{{ old('municipio') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Rua</label>
                            <input name="rua" value="{{ old('rua') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Número</label>
                            <input name="numero" value="{{ old('numero') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Complemento</label>
                            <input name="complemento" value="{{ old('complemento') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Bairro</label>
                            <input name="bairro" value="{{ old('bairro') }}" class="form-control">
                        </div>
                        <div  class="container col-md-2">
                            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                        </div>
                    </form>
                </div>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection  

