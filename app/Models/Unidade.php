<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unidade extends Model
{
    use HasFactory;
    protected $fillable = ['unidade', 'descricao'];
}
