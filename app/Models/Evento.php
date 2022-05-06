<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = "eventos";
    protected $fillable = [
        'fecha',
        'nombre',
        'lugar',
        'apertura',
        'cierre',
        'estatus'
    ];

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
