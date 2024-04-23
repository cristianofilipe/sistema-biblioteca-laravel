<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_emprestimo';

    protected $fillable = [
        'data_devolucao',
        'data_emprestimo',
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
