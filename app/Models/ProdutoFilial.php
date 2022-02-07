<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoFilial extends Model
{
    use HasFactory;
    protected $table = 'produto_filiais';
    protected $fillable = ['filial_id','produto_id','preco_venda','estoque_maximo', 'estoque_minimo'];
}
