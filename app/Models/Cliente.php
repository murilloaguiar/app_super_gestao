<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public static function rules (){
        return [
            'nome' =>'required|min:3|max:40'
        ];
    }

    public static function feedback(){
        return [
            'required'=>'O campo :attribute precisa ser prenchido',
            'nome.min' => 'nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'nome precisa ter no máximo 40 caracteres'
        ];
    }
}
