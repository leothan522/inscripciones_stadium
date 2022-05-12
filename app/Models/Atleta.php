<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atleta extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "atletas";
    protected $fillable = [
        'users_id',
        'cedula',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'sexo',
        'fecha_nac',
        'pais',
        'telefono_celular',
        'clubes_id',
        'talla_franela',
        'path_foto',
        'direccion',
        'telefono_residencia',
        'grupo_sanguineo',
        'alergico',
        'alergias',
        'contacto_emergencia',
        'telefono_emergencia',
        'antecedentes_medicos',
        'observaciones'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function club()
    {
        return $this->belongsTo(Club::class, 'clubes_id', 'id');
    }

    public function eventos()
    {
        return $this->hasMany(Particiante::class, 'atletas_id', 'id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'atletas_id', 'id');
    }

}
