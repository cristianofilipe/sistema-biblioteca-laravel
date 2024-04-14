<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_entrada',
        'tipo_material',
        'modo_aquisicao',
        'qtd_material',
        'usuario_id'
    ];

    protected $primaryKey = 'id_material';

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'material_id');
    }

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class, 'material_id');
    }

    public function livro()
    {
        return $this->hasOne(Livro::class, 'material_id');
    }

    public function revista()
    {
        return $this->hasOne(Revista::class, 'material_id');
    }

    public function tcc()
    {
        return $this->hasOne(TCC::class, 'material_id');
    }

    public function cd()
    {
        return $this->hasOne(CD::class, 'material_id');
    }

    public function administrador()
    {
        return $this->belongsTo(Administrador::class);
    }

}
