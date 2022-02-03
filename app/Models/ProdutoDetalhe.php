<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdutoDetalhe extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id','comprimento','largura','altura','unidade_id'];

    public function produto(){
        return $this->belongsTo('App\Produto');
    }
}
