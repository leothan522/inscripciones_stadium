<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\EventoExport;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Modalidad;
use App\Models\Pago;
use App\Models\Particiante;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantesController extends Controller
{
    public function index()
    {
        return view('dashboard.participantes.participantes');
    }

    public function export($idEvento)
    {


        $evento = Evento::find($idEvento);
        $participantes = Particiante::where('eventos_id', $idEvento)->get();
        $participantes->each(function ($participante){
            $pago = Pago::where('participantes_id', $participante->id)->first();
            $participante->estatus = $pago->estatus;
            $participante->p_banco = $pago->banco;
            $participante->p_tipo = $pago->tipo;
            $participante->p_fecha = $pago->fecha;
            $participante->p_comprobante = $pago->comprobante;
            $modalidades = Modalidad::find($participante->modalidades_id);
            $participante->modalidad = $modalidades->nombre;
            //$categorias = Categoria::where('eventos_id', $pago->evento->id)->where('modalidades_id', $pago->participante->modalidades_id)->get()
        });

        /*return view('dashboard.participantes.export')
            ->with('evento', $evento)
            ->with('participantes', $participantes);*/

        return Excel::download(new EventoExport($evento, $participantes), "$evento->nombre.xlsx");
    }

}
