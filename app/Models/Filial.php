<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;
    protected $table = 'filiais';
    protected $fillable = ['filial'];

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
