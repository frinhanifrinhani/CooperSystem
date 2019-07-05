@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar Produto</div>
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
                    <form action="/produto/salvar" method="post">
                        <input type="hidden" name="_token" value="{{{csrf_token()}}}" >
                        <div class="form-group">
                            <label>Nome</label>
                            <input name="nome" value="{{ old('nome') }}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Valor Unitário</label>
                            <input name="valor_unitario" value="{{ old('valor_unitario') }}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Quantidade em Estoque</label>
                            <input name="quantidade_estoque" value="{{ old('quantidade_estoque') }}" type="number" class="form-control">
                        </div>
                        <input type="hidden" name="situacao" >
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

