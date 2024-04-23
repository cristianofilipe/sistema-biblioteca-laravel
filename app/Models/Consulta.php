<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_consultas';

    protected $fillable = [
        'data_consulta',
        'visitante_id',
        'material_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

}