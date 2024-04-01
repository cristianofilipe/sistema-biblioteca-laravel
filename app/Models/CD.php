<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cd';

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
