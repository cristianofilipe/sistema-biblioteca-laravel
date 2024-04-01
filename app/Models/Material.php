<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_material';

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'material_id');
    }

    public function livro()
    {
        return $this->hasOne(Livro::class, 'material_id');
    }

    public function revista()
    {
        return $this->hasMany(Revista::class, 'material_id');
    }

    public function tcc()
    {
        return $this->hasMany(TCC::class, 'material_id');
    }

    public function cd()
    {
        return $this->hasMany(CD::class, 'material_id');
    }

}
