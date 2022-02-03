<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteContato extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'telefone','email','motivo_contatos_id','mensagem'];
}
