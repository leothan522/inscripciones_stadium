<?php

namespace App\Http\Livewire;

use App\Mail\ConfirmacionIncripcion;
use App\Mail\Liberacion;
use App\Models\Categoria;
use App\Models\Modalidad;
use App\Models\Pago;
use App\Models\Particiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class PagosComponent extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $listaPagos = [], $busqueda;
    public $nombreEvento, $lugarEvento, $fechaEvento, $horaEvento, $participante_id, $pago_id, $estatusPago, $categorias,
        $categoriasAtleta, $banco, $tipo, $fecha, $comprobante, $monto, $modalidad;
    public $cedula, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $sexo, $fechaNac, $nombreClub;


    public function mount(Request $request)
    {
        if (!is_null($request->buscar)){
            $this->busqueda = $request->buscar;
        }
    }

    public function render()
    {
        $this->listarPagos();
        return view('livewire.pagos-component');
    }

    public function listarPagos($estatus = null)
    {
        if (!is_null($estatus)){
            $pagos = Pago::buscar($this->busqueda)->where('estatus', $estatus)->orderBy('fecha', 'ASC')->get();
        }else{
            $pagos = Pago::buscar($this->busqueda)->orderBy('fecha', 'DESC')->get();
        }

        $this->listaPagos = $pagos;
    }

    public function verPago($id)
    {
        $pago = Pago::find($id);
        $this->nombreEvento = $pago->evento->nombre;
        $this->lugarEvento = $pago->evento->lugar;
        $this->fechaEvento = $pago->evento->fecha;
        $this->horaEvento = $pago->evento->hora;
        $this->cedula = $pago->atleta->cedula;
        $this->primerNombre = $pago->atleta->primer_nombre;
        $this->segundoNombre = $pago->atleta->segundo_nombre;
        $this->primerApellido = $pago->atleta->primer_apellido;
        $this->segundoApellido = $pago->atleta->segundo_apellido;
        $this->sexo = $pago->atleta->sexo;
        $this->fechaNac = $pago->atleta->fecha_nac;
        $this->nombreClub = $pago->atleta->club->nombre;
        $this->participante_id = $pago->participante->id;
        $categorias = Categoria::where('eventos_id', $pago->evento->id)->where('modalidades_id', $pago->participante->modalidades_id)->get();
        $this->categorias = $categorias;
        $this->categoriasAtleta = $pago->participante->categorias;
        $modalidad = Modalidad::where('id', $pago->participante->modalidades_id)->first();
        $this->modalidad = $modalidad->nombre;
        $this->banco = $pago->banco;
        $this->tipo = $pago->tipo;
        $this->fecha = $pago->fecha;
        $this->comprobante = $pago->comprobante;
        $this->monto = $pago->monto;
        $this->estatusPago = $pago->estatus;
        $this->pago_id = $pago->id;

    }

    public function validarPago($id, $estatus)
    {
        $pago = Pago::find($id);
        $pago->estatus = $estatus;
        $pago->update();

        $this->estatusPago = $estatus;

        if ($estatus == 1){
            $to = $pago->atleta->user->email;
            $cc = "inscripcioneseventosstadium@hotmail.com";
            Mail::to($cc)->send(new ConfirmacionIncripcion($pago->eventos_id, $pago->participantes_id, $pago->id));
            Mail::to($cc)->send(new Liberacion($pago->eventos_id, $pago->participantes_id));
            Mail::to($to)->send(new ConfirmacionIncripcion($pago->eventos_id, $pago->participantes_id, $pago->id));
            Mail::to($to)->send(new Liberacion($pago->eventos_id, $pago->participantes_id));
        }

        $this->alert(
            'success',
            'Datos Guardados'
        );
    }

}
