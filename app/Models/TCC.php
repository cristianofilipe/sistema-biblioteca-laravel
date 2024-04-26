<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCC extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tcc';

    protected $table = 'tccs';

    protected $fillable = [
        'tema',
        'orientador',
        'material_id',
        'curso_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function autores()
    {
        return $this->hasMany(AutorTcc::class, 'tcc_id');
    }
}
