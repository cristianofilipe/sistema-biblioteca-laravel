<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_visitante';

    protected $fillable = [
        'nome',
        'sexo'
    ];

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class, 'visitante_id');
    }

    public function telefones()
    {
        //uma visitante pode ter varios telefones
        return $this->hasMany(Telefone::class, 'visitante_id');
    }

    public function aluno()
    {
        //uma visitante tem um unico aluno associado
        return $this->hasOne(Aluno::class, 'visitante_id');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'visitante_id');
    }

    public function professor()
    {
        return $this->hasOne(Professor::class, 'visitante_id');
    }
}
