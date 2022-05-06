<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $table = "clubes";
    protected $fillable = [
        'nombre',
        'estatus'
    ];

    public function atletas()
    {
        return $this->hasMany(Atleta::class, 'clubes_id', 'id');
    }

}
