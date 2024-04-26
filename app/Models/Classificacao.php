<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    use HasFactory;

    protected $primaryKey = 'cdd';

    protected $table = 'classificacao';

    protected $fillable = ['nome'];

    public function livros() {
        return $this->belongsToMany(Livro::class);
    }
}