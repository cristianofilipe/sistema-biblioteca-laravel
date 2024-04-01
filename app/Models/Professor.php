<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Professor extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_professor';

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_professor', 'professor_id', 'curso_id');
    }
}
