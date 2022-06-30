<?php

namespace App\Mail;

use App\Models\Evento;
use App\Models\Particiante;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Liberacion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($evento_id, $participante_id)
    {
        $this->evento_id = $evento_id;
        $this->participante_id = $participante_id;
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
        return $this->view('dashboard.mails.liberacion')
            ->with('evento', $evento)
            ->with('participante', $participante);
    }
}
