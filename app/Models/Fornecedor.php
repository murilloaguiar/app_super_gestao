<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
     //
     use SoftDeletes;
     use HasFactory;

     protected $table = 'fornecedores';
     protected $fillable = ['nome','site','uf','email'];

     public function produtos(){
          return $this->hasMany('App\Models\Item','fornecedor_id','id');
     }

     public static function rules(){
          return [
               'nome'=> 'required|min:3|max:40',
               'site'=> 'required',
               'uf'=> 'required|min:2|max:2',
               'email'=> 'email'
          ];
     }

     public static function feedback(){
          return [
               'required' => 'O campo :attribute deve ser preenchido',
               'nome.min' => 'O campo nome deve ter no mínimo três caracteres',
               'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
               'uf.min' => 'O campo uf deve ter no mínimo três caracteres',
               'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
               'email.email' => 'O campo email deve ser um email válido'
          ];
     }
}
