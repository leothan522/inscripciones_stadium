<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Particiante extends Model
{
    use HasFactory;
    protected $table = "participantes";
    protected $fillable =[
        'eventos_id',
        'categorias_id',
        'atletas_id'
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'eventos_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categorias_id', 'id');
    }

    public function atleta()
    {
        return $this->belongsTo(Atleta::class, 'atletas_id', 'id');
    }

}
