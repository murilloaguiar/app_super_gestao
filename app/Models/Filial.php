<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;
    protected $table = 'filiais';
    protected $fillable = ['filial'];

    public function produtos(){
        return $this->BelongsToMany('App\Models\Item','produto_filiais','filial_id','produto_id')->withPivot('id','preco_venda','estoque_maximo','estoque_minimo');
    }

    public function rules(){
        return [
            'filial' => "required|unique:filiais,filial, $this->id|min:3"
        ];
    }

    public function feedback(){
        return [
            'required' => 'Preencha o nome da filial',
            'unique' => 'Esta filial já está cadastrada',
            'min' => 'O nome precisa ter no mínimo 3 caracteres'
        ];
    }
}
