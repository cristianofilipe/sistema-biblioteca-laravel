<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCC extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tcc';

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
