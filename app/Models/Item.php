<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $table = 'produtos'; //A classe item tem que mapear a tabela produtos la do bd
    protected $fillable = ['nome', 'descricao','peso','unidade_id','fornecedor_id'];

    public function itemDetalhe(){
        return $this->hasOne('App\Models\ItemDetalhe','produto_id','id');
    }

    public function fornecedor(){
        return $this->belongsTo('App\Models\Fornecedor');
    }

    public function pedidos(){
        return $this->belongsToMany('App\Models\Pedido', 'pedidos_produtos','produto_id','pedido_id');
    }

    public function filiais(){
        return $this->belongsToMany('App\Models\Filial','produto_filiais','produto_id','filial_id');
    }
}
