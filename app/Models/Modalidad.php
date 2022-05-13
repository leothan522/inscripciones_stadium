<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;
    protected $table = "modalidades";
    protected $fillable = [
        'nombre',
        'eventos_id'
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'eventos_id', 'id');
    }

    public function participantes()
    {
        return $this->hasMany(Particiante::class, 'modalidades_id', 'id');
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'modalidades_id', 'id');
    }


}
