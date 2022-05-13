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
        'atletas_id',
        'modalidades_id',
        'categorias',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'eventos_id', 'id');
    }

    public function modalidad()
    {
        $this->belongsTo(Modalidad::class, 'modalidades_id', 'id');
    }

    public function atleta()
    {
        return $this->belongsTo(Atleta::class, 'atletas_id', 'id');
    }

}
