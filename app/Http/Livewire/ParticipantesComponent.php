<?php

namespace App\Http\Livewire;

use App\Models\Atleta;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Modalidad;
use App\Models\Pago;
use App\Models\Particiante;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ParticipantesComponent extends Component
{
    use LivewireAlert;
    public $view = 'create', $evento_id, $select, $pago_id, $estatusPago, $categorias,
        $categoriasAtleta, $banco, $tipo, $fechaPago, $comprobante, $monto, $modalidad;
    public $nombre, $fecha, $hora, $lugar, $apertura, $h_apertura, $cierre, $h_cierre;
    public $listaAtletas;
    public $cedulaAtleta, $nombreAtleta, $celularAtleta, $correoAtleta, $clubAtleta, $paisAtleta, $sexoAtleta, $path,
                $edad, $fechaAtleta, $segundoNombre, $segundoApellido, $tallaAtleta, $participante_id;

    public function render()
    {
        $eventos = Evento::pluck('nombre', 'id');
        return view('livewire.participantes-component')
            ->with('eventos', $eventos);
    }

    public function updatedselect()
    {
        $evento = Evento::where('id', $this->select)->first();
        if ($evento){
            $this->evento_id = $evento->id;
            $this->nombre = $evento->nombre;
            $this->fecha = $evento->fecha;
            $this->hora = $evento->hora;
            $this->lugar = $evento->lugar;
            $this->apertura = $evento->apertura;
            $this->h_apertura = $evento->h_apertura;
            $this->cierre = $evento->cierre;
            $this->h_cierre = $evento->h_cierre;

            $participantes = Particiante::where('eventos_id', $this->evento_id)->get();
            $participantes->each(function ($participante){
                $pago = Pago::find($participante->pagos_id);
                $participante->estatus = $pago->estatus;
            });
            $this->listaAtletas = $participantes;
            $this->view = 'update';

        }else{
            $this->limpiar();
        }
    }

    public function limpiar()
    {
        $this->select = null;
        $this->evento_id = null;
        $this->nombre = null;
        $this->fecha = null;
        $this->hora = null;
        $this->lugar = null;
        $this->apertura = null;
        $this->h_apertura = null;
        $this->cierre = null;
        $this->h_cierre = null;
        $this->view = 'create';
    }

    public function verParticipante($idAtleta, $idPago, $idParticipante)
    {
        $pago = Pago::find($idPago);
        $categorias = Categoria::where('eventos_id', $pago->evento->id)->where('modalidades_id', $pago->participante->modalidades_id)->get();
        $this->categorias = $categorias;
        $this->categoriasAtleta = $pago->participante->categorias;
        $modalidad = Modalidad::where('id', $pago->participante->modalidades_id)->first();
        $this->modalidad = $modalidad->nombre;
        $this->banco = $pago->banco;
        $this->tipo = $pago->tipo;
        $this->fechaPago = $pago->fecha;
        $this->comprobante = $pago->comprobante;
        $this->monto = $pago->monto;
        $this->pago_id = $pago->id;
        $this->estatusPago = $pago->estatus;

        $atleta = Atleta::find($idAtleta);
        $this->nombreAtleta = strtoupper($atleta->primer_nombre." ".$atleta->primer_apellido);
        $this->segundoNombre = strtoupper($atleta->segundo_nombre);
        $this->segundoApellido = strtoupper($atleta->segundo_apellido);
        $this->cedulaAtleta = $atleta->cedula;
        $this->fechaAtleta = $atleta->fecha_nac;
        $this->edad = calcularEdad($atleta->fecha_nac);
        $this->sexoAtleta = $atleta->sexo;
        $this->celularAtleta = $atleta->telefono_celular;
        $this->clubAtleta = $atleta->club->nombre;
        $this->paisAtleta = paises($atleta->pais);
        $this->tallaAtleta = $atleta->talla_franela;

        $this->participante_id = $idParticipante;

        $this->verFoto($idAtleta);
        $this->updatedselect();

    }

    public function verFoto($id = null)
    {
        $atleta = Atleta::where('id', $id)->first();
        if ($atleta){
            if ($atleta->path_foto == null){
                $this->path = asset('img/user.png');
            }else{
                $this->path = $atleta->path_foto;
                $this->pathFoto = $atleta->path_foto;
            }
        }else{
            $this->path = null;
        }


    }



}
