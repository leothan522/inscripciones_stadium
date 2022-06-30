<?php

namespace App\Mail;

use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Modalidad;
use App\Models\Pago;
use App\Models\Particiante;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal;

class ConfirmacionIncripcion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($evento_id, $participante_id, $pago_id)
    {
        $this->evento_id = $evento_id;
        $this->participante_id = $participante_id;
        $this->pago_id = $pago_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $evento = Evento::find($this->evento_id);
        $participante = Particiante::find($this->participante_id);
        $participante->nombre = $participante->atleta->primer_nombre." ".$participante->atleta->segundo_nombre." ".$participante->atleta->primer_apellido." ".$participante->atleta->segundo_apellido;
        $participante->cedula = $participante->atleta->cedula;
        $participante->fecha = $participante->atleta->fecha_nac;
        $participante->sexo = $participante->atleta->sexo;
        $participante->club = $participante->atleta->club->nombre;
        $pago = Pago::find($this->pago_id);
        $modalidad = Modalidad::where('eventos_id', $this->evento_id)->first();
        $categorias = Categoria::where('eventos_id', $this->evento_id)->where('modalidades_id', $modalidad->id)->get();
        $categoriasAtleta = $categorias;
        return $this->view('dashboard.mails.confirmar_inscripcion')
            ->with('evento', $evento)
            ->with('modalidad', $modalidad)
            ->with('participante', $participante)
            ->with('pago', $pago)
            ->with('categorias', $categorias)
            ->with('categoriasAtleta', $categoriasAtleta);
    }
}
