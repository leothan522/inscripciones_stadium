<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = "pagos";
    protected $fillable = [
        'comprobante',
        'banco',
        'tipo',
        'fecha',
        'monto',
        'eventos_id',
        'atletas_id',
        'estatus'
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'eventos_id', 'id');
    }

    public  function atleta()
    {
        return $this->belongsTo(Atleta::class, 'atletas_id', 'id');
    }

}
