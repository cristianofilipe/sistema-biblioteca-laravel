<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_adm';

    protected $fillable = [
        'nome',
        'tipo_adm',
        'email',
        'senha'
    ];

    public function materiais()
    {
        return $this->hasMany(Material::class);
    }
}
