<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cd';

    protected $table = 'cds';

    protected $fillable = [
        'capacidade',
        'conteudo',
        'material_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
