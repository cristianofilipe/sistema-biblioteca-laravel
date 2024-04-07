<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_emprestimo';

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}
