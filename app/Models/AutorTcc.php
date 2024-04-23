<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorTcc extends Model
{
    use HasFactory;

    protected $table = "autortcc";

    protected $fillable = [
        'nome',
        'tcc_id'
    ];

    public function tcc() 
    {
        return $this->belongsTo(TCC::class);
    }
}
