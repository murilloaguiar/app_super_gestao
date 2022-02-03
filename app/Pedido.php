<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos(){
        //return $this->belongsToMany('App\Produto', 'pedido_produtos');
        return $this->belongsToMany('App\Item', 'pedidos_produtos','pedido_id','produto_id')->withPivot('id','created_at');
        /*
            1 - Modelo do relacionamento NxN em relanção ao Modelo que estamos implmentando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK na tabela de relacionamento que é o id da tabela mapeada pelo modelo atual
            4 - Representa o nome da FK na tabela de relacionamento que é o id da tabela mapeada no belongsToMany
        */
    }
}
