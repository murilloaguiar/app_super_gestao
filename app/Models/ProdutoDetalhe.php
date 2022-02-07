<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdutoDetalhe extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id','comprimento','largura','altura','unidade_id'];

    public function produto(){
        return $this->belongsTo('App\Models\Produto');
    }

    public static function rules(){
        return [
            'produto_id' =>'unique:produto_detalhes|required',
            'comprimento' => 'required|numeric',
            'largura' => 'required|numeric',
            'altura' => 'required|numeric',
            'unidade' => 'required'
        ];
    }
    public static function feedback(){
        return [
            'produto_id.unique' =>'Já existem detalhes para o id desse produto',
            'required' => 'Preencha o campo :attribute',
            'numeric' => 'O campo :attribute precisa ser apenas numeros'
        ];
    }
}
