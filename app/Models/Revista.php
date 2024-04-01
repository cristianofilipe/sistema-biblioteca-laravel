<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_revista';

    public function material() 
    {
        return $this->belongsTo(Material::class);
    }

}
