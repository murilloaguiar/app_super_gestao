<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteContato extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'telefone','email','motivo_contatos_id','mensagem'];

    public static function rules(){
        return [
            'nome'=> 'required|min:3|max:40|unique:site_contatos', //nomes com no mínimo 3 caracteres e no máximo 40 e únicos.
            'telefone'=> 'required',
            'email'=> 'email',//verifica se fornece um dado de email válido
            'motivo_contatos_id'=> 'required',
            'mensagem'=> 'required|max:500'
        ];
    }
    public static function feedback(){
        return [
            //customizando as mensagens de feedback
            'nome.min' => 'O campo nome precisa ter pelo menos 3 caracteres',
            'nome.max' => 'O campo nome precisa ter menos de 40 caracteres',
            'nome.unique' => 'Este nome já existe',

            'email.email' => 'Digite um email válido',

            'mensagem.max' => 'O campo mensagem precisa ter menos de 500 caracteres',
            
            'required'=> 'O campo :attribute acima precisa ser preenchido' //mensagem default para a validação, attribute recupera o campo em que esta sendo aplicada a validação
        ];
    }
}
