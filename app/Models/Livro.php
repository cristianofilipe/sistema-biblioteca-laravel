<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_livro';

    protected $fillable = [
        'titulo',
        'volume',
        'ano_publicacao',
        'edicao',
        'isbn',
        'editora',
        'cdd',
        'material_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class);
    }

}
