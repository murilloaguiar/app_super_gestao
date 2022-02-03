<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model{
    use HasFactory;
    protected $fillable = ['nome', 'descricao','peso','unidade_id'];

    public function produtoDetalhe(){
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
