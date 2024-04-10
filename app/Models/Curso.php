<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_curso';

    protected $fillable = [
        'nome'
    ];

    public function alunos()
    {
        //um curso pode ter varios alunos associados
        return $this->hasMany(Aluno::class, 'curso_id');
    }

    public function professores()
    {
        return $this->belongsToMany(Professor::class, 'curso_professor', 'curso_id', 'professor_id');
    }

    public function tccs()
    {
        return $this->hasMany(TCC::class, 'curso_id');
    }
}
