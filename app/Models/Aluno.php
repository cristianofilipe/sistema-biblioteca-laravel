<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_aluno';

    protected $fillable = [
        'classe',
        'turma',
        'curso_id',
        'visitante_id'
    ];

    public function visitante()
    {
        return $this->belongsTo(Visitante::class, 'visitante_id');
    }

    public function curso()
    {
        //um aluno pertence a um unico curso
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function tcc()
    {
        return $this->belongsTo(TCC::class);
    }
}
