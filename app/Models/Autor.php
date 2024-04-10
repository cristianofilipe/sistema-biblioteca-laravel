<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_autor';

    protected $fillable = [
        'nome',
        'cota_autor'
    ];

    public function livros()
    {
        return $this->belongsToMany(Livro::class);
    }
}
