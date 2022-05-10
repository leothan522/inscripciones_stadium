<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Modalidad;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EventosComponent extends Component
{
    use LivewireAlert;

    public $nombre, $fecha, $hora, $lugar, $apertura, $h_apertura, $cierre, $h_cierre;
    public $view = 'create', $evento_id, $select, $modalidades;
    public $modal = 'create', $nombreModalidad, $modalidades_id, $categorias, $nombreCategoria, $categorias_id;
    public $items;

    protected $listeners = [
        'confirmed',
        'confirmedModalidad',
        'confirmedCategoria'
    ];

    public function render()
    {
        $eventos = Evento::pluck('nombre', 'id');
        return view('livewire.eventos-component')
            ->with('eventos', $eventos);
    }

    protected $rules = [
        'nombre' => ['required', 'min:4'],
        'lugar' => 'required|min:4',
        'fecha' => 'required',
        'hora' => 'required',
        'apertura' => 'required|before:fecha',
        'h_apertura' => 'required',
        'cierre' => 'required|before_or_equal:fecha|after_or_equal:apertura',
        'h_cierre' => 'required|after:h_apertura',
    ];

    protected $messages = [
        'h_apertura.required' => 'El campo hora es obligatorio.',
        'h_cierre.required' => 'El campo hora es obligatorio.',
        'h_cierre.after' => 'La hora cierre debe ser posterior a hora de apertura. ',
    ];

    public function store()
    {
        $this->validate();

        $evento = new Evento();
        $evento->nombre = strtoupper($this->nombre);
        $evento->fecha = $this->fecha;
        $evento->hora = $this->hora;
        $evento->lugar = strtoupper($this->lugar);
        $evento->apertura = $this->apertura;
        $evento->h_apertura = $this->h_apertura;
        $evento->cierre = $this->cierre;
        $evento->h_cierre = $this->h_cierre;
        $evento->save();

        $this->evento_id = $evento->id;
        $this->select = $evento->id;
        $this->view = 'update';
        $this->verModalidades();

        $this->alert(
            'success',
            "Evento Creado Exitosamente"
        );
    }

    public function update()
    {
        $this->validate();

        $evento = Evento::find($this->evento_id);
        $evento->nombre = strtoupper($this->nombre);
        $evento->fecha = $this->fecha;
        $evento->hora = $this->hora;
        $evento->lugar = strtoupper($this->lugar);
        $evento->apertura = $this->apertura;
        $evento->h_apertura = $this->h_apertura;
        $evento->cierre = $this->cierre;
        $evento->h_cierre = $this->h_cierre;
        $evento->update();

        $this->alert(
            'success',
            "hola"
        );
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
            $this->view = 'update';
            $this->verModalidades();
        }else{
            $this->limpiar();
        }

        /*$this->alert(
            'success',
            "hola"
        );*/

    }

    public function verModalidades()
    {
        $vermodalidades = Modalidad::where('eventos_id', $this->evento_id)->get();
        $this->modalidades = $vermodalidades;
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

    public function destroy($id)
    {
        $this->evento_id = $id;
        $this->confirm('¿Estas seguro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  '¡Sí, bórralo!',
            'text' =>  '¡No podrás revertir esto!',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed',
        ]);

    }


    public function confirmed()
    {
        // Example code inside confirmed callback
        $user = Evento::find($this->evento_id);
        $user->delete();
        $this->limpiar();
        $this->alert(
            'success',
            'Evento Eliminado'
        );

    }

    protected $rulesModalidad = [
        'nombreModalidad' => 'required|min:4'
    ];

    public function limpiarModalidad()
    {
        $this->modal = 'create';
        $this->modalidades_id = null;
        $this->nombreModalidad = null;
    }

    public function storeModalidad()
    {
        $this->validate($this->rulesModalidad);

        $modalidad = new Modalidad();
        $modalidad->nombre = strtoupper($this->nombreModalidad);
        $modalidad->eventos_id = $this->evento_id;
        $modalidad->save();

        $this->verModalidades();
        $this->modalidades_id = $modalidad->id;
        $this->modal = 'update';
        $this->categorias = null;

        $this->alert(
            'success',
            'Modalidad Creada Exitosamente'
        );
    }

    public function updateModalidad()
    {
        $this->validate($this->rulesModalidad);

        $modalidad = Modalidad::find($this->modalidades_id);
        $modalidad->nombre = strtoupper($this->nombreModalidad);
        $modalidad->update();

        $this->verModalidades();

        $this->alert(
            'success',
            'Cambios Guardados'
        );
    }

    public function edit($id)
    {
        $modalidad = Modalidad::find($id);
        $this->modal = 'update';
        $this->modalidades_id = $modalidad->id;
        $this->nombreModalidad = $modalidad->nombre;
        $this->categorias();
    }

    public function categorias()
    {
        $categorias = Categoria::where('modalidades_id', $this->modalidades_id)->get();
        $this->categorias = $categorias;
        $this->items = $categorias;
    }

    protected $rulesCategorias = [
        'nombreCategoria' => 'required|min:4'
    ];

    public function storeCategorias()
    {
        $this->validate($this->rulesCategorias);

        $categoria = new Categoria();
        $categoria->nombre = ucfirst($this->nombreCategoria);
        $categoria->eventos_id = $this->evento_id;
        $categoria->modalidades_id = $this->modalidades_id;
        $categoria->save();

        $this->nombreCategoria = null;

        $this->verModalidades();
        $this->categorias();

        $this->alert(
            'success',
            'Cambios Guardados'
        );
    }

    public function destroyModalidad($id)
    {
        $this->modalidades_id = $id;
        $this->confirm('¿Estas seguro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  '¡Sí, bórralo!',
            'text' =>  '¡No podrás revertir esto!',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmedModalidad',
        ]);

    }


    public function confirmedModalidad()
    {
        // Example code inside confirmed callback
        $user = Modalidad::find($this->modalidades_id);
        $user->delete();
        $this->verModalidades();
        //$this->limpiarModalidad();
        $this->alert(
            'success',
            'Evento Eliminado'
        );

    }

    public function destroyCategoria($id)
    {
        $this->categorias_id = $id;
        $this->confirm('¿Estas seguro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  '¡Sí, bórralo!',
            'text' =>  '¡No podrás revertir esto!',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmedCategoria',
        ]);

    }


    public function confirmedCategoria()
    {
        // Example code inside confirmed callback
        $user = Categoria::find($this->categorias_id);
        $user->delete();
        $this->verModalidades();
        $this->categorias();
        $this->categorias_id = null;
        //$this->limpiarModalidad();
        $this->alert(
            'success',
            'Evento Eliminado'
        );

    }

    public function editarCategorias()
    {
        foreach ($this->items as $i){

        }
        $this->alert(
            'success',
            'Evento elooooooo'
        );
    }


}
