<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_aluno';

    public function pessoa()
    {
        //um aluno pertence a uma unica pessoa
        return $this->belongsTo(Pessoa::class);
    }

    public function curso()
    {
        //um aluno pertence a um unico curso
        return $this->belongsTo(Curso::class);
    }
}
