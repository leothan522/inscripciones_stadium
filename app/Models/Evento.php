<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = "eventos";
    protected $fillable = [
        'nombre',
        'fecha',
        'hora',
        'lugar',
        'apertura',
        'h_apertura',
        'cierre',
        'h_cierre',
        'estatus'
    ];

    public function modalidades()
    {
        return $this->hasMany(Modalidad::class, 'eventos_id', 'id');
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'eventos_id', 'id');
    }

    public function participantes()
    {
        return $this->hasMany(Particiante::class, 'eventos_id', 'id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'eventos_id', 'id');
    }

}
