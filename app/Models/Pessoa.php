<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pessoa';

    public function telefones()
    {
        //uma pessoa pode ter varios telefones
        return $this->hasMany(Telefone::class, 'pessoa_id');
    }

    public function aluno()
    {
        //uma pessoa tem um unico aluno associado
        return $this->hasOne(Aluno::class, 'pessoa_id');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'pessoa_id');
    }

    public function professor()
    {
        return $this->hasOne(Professor::class, 'pessoa_id');
    }
}
