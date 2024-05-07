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
        'material_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_livro', 'livro_id', 'autor_id');
    }

    public function classificacoes() {
        return $this->belongsToMany(Classificacao::class);
    }

}
