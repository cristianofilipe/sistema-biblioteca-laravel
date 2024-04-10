<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_revista';

    protected $fillable = [
        'titulo',
        'subtitulo',
        'material_id'
    ];

    public function material() 
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

}
