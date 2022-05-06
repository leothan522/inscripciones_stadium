<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = "categorias";
    protected $fillable = [
        'eventos_id',
        'nombre'
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'eventos_id', 'id');
    }

    public function participantes()
    {
        return $this->hasMany(Particiante::class, 'categorias_id', 'id');
    }

}
