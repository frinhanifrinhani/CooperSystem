<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = ['nome','valor_unitario','quantidade_estoque','situacao'];
    protected $guarded = ['id', 'data_cadastro'];
    protected $table = 'produtos';
}


