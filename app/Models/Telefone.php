<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_telefone';

    protected $fillable = [
        'numero',
        'pessoa_id'
    ];

    public function usuario()
    {
        //um telefone pertence a uma pessoa
        return $this->belongsTo(Usuario::class);
    }
}
