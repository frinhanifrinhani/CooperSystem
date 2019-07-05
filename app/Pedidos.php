<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedidos extends Model
{
    protected $fillable = [
            'id',
            'produto_id',
            'nome',
            'quantidade',
            'valor_unitario',
            'solicitante',
            'cep',
            'uf',
            'municipio',
            'bairro',
            'rua',
            'numero',
            'complemento',
            'data_pedido'
        ];
    protected $guarded = ['pedido_id' ];
    protected $table = 'pedidos';
    
    public function pedidos(){
        $pedidos = DB::table('pedidos')
                    ->join('produtos', 'pedidos.produto_id','=','produtos.id')
                    ->select('pedidos.*','produtos.nome')
                    ->get();
        return $pedidos;
    }
    
    public function pedidoPorId($id){
        $pedido = DB::table('pedidos')
                    ->join('produtos', 'pedidos.produto_id','=','produtos.id')
                    ->select('pedidos.*','produtos.nome')
                    ->where('pedidos.id','=',$id)
                    ->get();
        return $pedido;
    }
}


