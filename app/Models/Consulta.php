<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_consultas';

    public function materiais()
    {
        return $this->belongsToMany(Material::class, 'material_id');
    }

    public function pessoas()
    {
        return $this->belongsToMany(Pessoa::class, 'pessoas', );
    }
}