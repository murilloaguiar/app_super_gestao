<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotivoContato extends Model
{
    use HasFactory;
    protected $fillable = ['motivo_contato'];
}
