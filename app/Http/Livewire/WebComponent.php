<?php

namespace App\Http\Livewire;

use App\Models\Atleta;
use App\Models\Categoria;
use App\Models\Club;
use App\Models\Evento;
use App\Models\Modalidad;
use App\Models\Pago;
use App\Models\Particiante;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class WebComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $cedula, $users_id, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $sexo, $fechaNac, $pais,
        $telefonoCelular, $clubes, $tallaFranela, $pathFoto, $direccion, $telefonoResidencia, $grupoSanguineo,
        $alergico = "NO", $alergias, $contactoEmergencia, $telefonoEmergencia, $antecedentesMedicos = "NO", $observaciones;
    public $listaClub = [], $registrarClub = false, $nombreClub, $atleta_id = null;
    public $photo, $path, $guardarFoto = false;
    public $viewInscripcion = 'inscripcion', $evento_id, $nombreEvento, $fechaEvento, $horaVento, $horaEvento, $lugarEvento,
        $listaModalidades = [], $modalidad, $categorias, $categoriasAtleta;
    public $banco, $tipoPago, $fechaPago, $comprobante, $monto, $estatusPago, $participante_id, $pago_id;

    public function render()
    {
        $hoy = date('Y-m-d');
        $hora = date('H:i');
        //dd($hora);
        $eventos = Evento::where('apertura', '<=', $hoy)->where('cierre', '>=', $hoy)->get();
        $eventos->each(function ($evento){
            $hoy = date('Y-m-d H:i:s');
            $desde = $evento->apertura.' '.$evento->h_apertura;
            $hasta = $evento->cierre.' '.$evento->h_cierre;
            if ($hoy >= $desde && $hoy <= $hasta){
                $evento->inscripcion = true;
            }else{
                $evento->inscripcion = false;
            }

        });
        $this->verPlanilla();
        $this->verFoto();
        return view('livewire.web-component')
            ->with('eventos', $eventos);
    }

    public function listaClubes()
    {
        $clubes = Club::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $clubes->push("POR ASIGNAR");
        return $clubes;
    }

    public function updatedclubes()
    {
        $existe = Club::find($this->clubes);
        if (!$existe)
        {
            $this->registrarClub = true;
        }else{
            $this->registrarClub = false;
            $this->nombreClub = null;
        }
    }

    public function verPlanilla()
    {
        $atleta = Atleta::where('users_id', auth()->id())->first();
        if ($atleta){

            $this->atleta_id = $atleta->id;
            $this->cedula = $atleta->cedula;
            $this->primerNombre = $atleta->primer_nombre;
            $this->segundoNombre = $atleta->segundo_nombre;
            $this->primerApellido = $atleta->primer_apellido;
            $this->segundoApellido = $atleta->segundo_apellido;
            $this->sexo = $atleta->sexo;
            $this->fechaNac = $atleta->fecha_nac;
            $this->pais = $atleta->pais;
            $this->telefonoCelular = $atleta->telefono_celular;
            $this->clubes = $atleta->clubes_id;
            $this->tallaFranela = $atleta->talla_franela;
            $this->direccion = $atleta->direccion;
            $this->telefonoResidencia = $atleta->telefono_residencia;
            $this->grupoSanguineo = $atleta->grupo_sanguineo;
            $this->alergico = $atleta->alergico;
            $this->alergias = $atleta->alergias;
            $this->contactoEmergencia = $atleta->contacto_emergencia;
            $this->telefonoEmergencia = $atleta->telefono_emergencia;
            $this->antecedentesMedicos = $atleta->antecedentes_medicos;
            $this->observaciones = $atleta->observaciones;

        }

        $this->listaClub = $this->listaClubes();

    }

    protected function rules()
    {
        return [
            'cedula' => ['required', Rule::unique('atletas', 'cedula')->ignore(auth()->id(), 'users_id')],
            /*'cedula'                => 'required|numeric|digits_between:6,8|integer|unique:atletas,cedula',*/
            'sexo'                  => 'required',
            'fechaNac'              => 'required',
            'primerApellido'        => 'required|alpha',
            'segundoApellido'       => 'nullable|alpha',
            'primerNombre'          => 'required|alpha',
            'segundoNombre'         => 'nullable|alpha',
            'pais'                  => 'required',
            'telefonoCelular'       => 'required|regex:/[0-9]{9}/',
            'telefonoResidencia'    => 'nullable|regex:/[0-9]{9}/',
            'clubes'                => 'required',
            'tallaFranela'          => 'required|alpha',
            'contactoEmergencia'    => 'nullable|alpha',
            'telefonoEmergencia'    => 'nullable|regex:/[0-9]{9}/',
            'nombreClub'            =>  'required_if:registrarClub,true|unique:clubes,nombre',
            'alergias'              =>  'required_if:alergico,SI',
            'observaciones'              =>  'required_if:antecedentesMedicos,SI'
        ];
    }

    protected $messages = [
        'fechaNac.required'         =>  ' El campo F. Nacimiento es obligatorio.',
        'nombreClub.required_if'    =>  'El campo nombre club es obligatorio cuando club es POR ASIGNAR. '
    ];

    public function storePlanilla()
    {
        $this->validate();

        if($this->registrarClub){
            $club = new Club();
            $club->nombre = strtoupper($this->nombreClub);
            $club->save();
            $this->listaClubes();
            $this->clubes = $club->id;
            $this->registrarClub = false;
            $this->nombreClub = null;
        }

        $atleta = new Atleta();
        $atleta->cedula = $this->cedula;
        $atleta->users_id = auth()->id();
        $atleta->primer_nombre = strtoupper($this->primerNombre);
        $atleta->segundo_nombre = strtoupper($this->segundoNombre);
        $atleta->primer_apellido = strtoupper($this->primerApellido);
        $atleta->segundo_apellido = strtoupper($this->segundoApellido);
        $atleta->sexo = $this->sexo;
        $atleta->fecha_nac = $this->fechaNac;
        $atleta->pais = $this->pais;
        $atleta->telefono_celular = $this->telefonoCelular;
        $atleta->clubes_id = $this->clubes;
        $atleta->talla_franela = strtoupper($this->tallaFranela);
        $atleta->direccion = strtoupper($this->direccion);
        $atleta->telefono_residencia = $this->telefonoResidencia;
        $atleta->grupo_sanguineo = $this->grupoSanguineo;
        $atleta->alergico = $this->alergico;
        $atleta->alergias = strtoupper($this->alergias);
        $atleta->contacto_emergencia = strtoupper($this->contactoEmergencia);
        $atleta->telefono_emergencia = $this->telefonoEmergencia;
        $atleta->antecedentes_medicos = $this->antecedentesMedicos;
        $atleta->observaciones = strtoupper($this->observaciones);
        $atleta->save();

        $this->atleta_id = $atleta->id;
        $this->verFoto();

        if ($this->evento_id != null){
            $this->viewInscripcion = 'inscripcion';
        }

        $this->alert(
            'success',
            'Datos Guardados'
        );

    }

    public function updatePlanilla()
    {
        $this->validate();

        if($this->registrarClub){
            $club = new Club();
            $club->nombre = strtoupper($this->nombreClub);
            $club->save();
            $this->listaClubes();
            $this->clubes = $club->id;
            $this->registrarClub = false;
            $this->nombreClub = null;
        }

        $atleta = Atleta::find($this->atleta_id);
        $atleta->cedula = $this->cedula;
        //$atleta->users_id = auth()->id();
        $atleta->primer_nombre = strtoupper($this->primerNombre);
        $atleta->segundo_nombre = strtoupper($this->segundoNombre);
        $atleta->primer_apellido = strtoupper($this->primerApellido);
        $atleta->segundo_apellido = strtoupper($this->segundoApellido);
        $atleta->sexo = $this->sexo;
        $atleta->fecha_nac = $this->fechaNac;
        $atleta->pais = $this->pais;
        $atleta->telefono_celular = $this->telefonoCelular;
        $atleta->clubes_id = $this->clubes;
        $atleta->talla_franela = strtoupper($this->tallaFranela);
        $atleta->direccion = strtoupper($this->direccion);
        $atleta->telefono_residencia = $this->telefonoResidencia;
        $atleta->grupo_sanguineo = $this->grupoSanguineo;
        $atleta->alergico = $this->alergico;
        $atleta->alergias = strtoupper($this->alergias);
        $atleta->contacto_emergencia = strtoupper($this->contactoEmergencia);
        $atleta->telefono_emergencia = $this->telefonoEmergencia;
        $atleta->antecedentes_medicos = $this->antecedentesMedicos;
        $atleta->observaciones = strtoupper($this->observaciones);
        $atleta->update();

        $this->alert(
            'success',
            'Cambios Guardados'
        );

    }

    public function verFoto()
    {
        $atleta = Atleta::where('users_id', auth()->id())->first();
        if ($atleta){
            //registrado
            $this->guardarFoto = true;
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

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function storeFoto()
    {
        $this->validate([
            'photo' => 'required|image|max:1024', // 1MB Max
        ]);

        if ($this->pathFoto != null){
            if (file_exists($this->path)){
                unlink($this->path);
            }
        }

        $ruta = $this->photo->store('public/photos');
        $this->path = str_replace('public/', 'storage/', $ruta);
        $atleta = Atleta::find($this->atleta_id);
        $atleta->path_foto = $this->path;
        $atleta->update();
        $this->photo = null;
        $this->verFoto();

        $this->alert(
            'success',
            'Foto Guardada'
        );
    }

    public function limpiar()
    {

    }

    public function formInscripcion($id)
    {
        $evento = Evento::find($id);
        $this->evento_id = $id;
        $this->nombreEvento = $evento->nombre;
        $this->fechaEvento = $evento->fecha;
        $this->lugarEvento = $evento->lugar;
        $this->horaEvento = $evento->hora;
        $this->listaModalidades = $evento->modalidades->pluck('nombre', 'id');

        $atleta = Atleta::where('users_id', auth()->id())->first();
        if ($atleta){
            $club = Club::find($atleta->clubes_id);
            $this->nombreClub = $club->nombre;
            $participante = Particiante::where('eventos_id', $id)->where('atletas_id', $atleta->id)->first();
            $pago = Pago::where('eventos_id', $id)->where('atletas_id', $atleta->id)->first();
            if ($participante && $pago){
                $this->participante_id = $participante->id;
                $this->pago_id = $pago->id;
                $this->modalidad = $participante->modalidades_id;
                $this->categoriasAtleta = $participante->categorias;
                $this->categorias = Categoria::where('modalidades_id', $this->modalidad)->get();
                $this->comprobante = $pago->comprobante;
                $this->banco = $pago->banco;
                $this->tipoPago = $pago->tipo;
                $this->fechaPago = $pago->fecha;
                $this->monto = $pago->monto;
                $this->estatusPago = $pago->estatus;
            }else{
                $this->participante_id = null;
                $this->pago_id = null;
                $this->modalidad = null;
                $this->categoriasAtleta = null;
                $this->comprobante = null;
                $this->banco = null;
                $this->tipoPago = null;
                $this->fechaPago = null;
                $this->monto = null;
                $this->estatusPago = null;
            }

        }else{
            $this->viewInscripcion = 'planilla';
        }
    }

    public function updatedmodalidad()
    {
        if($this->modalidad){
            $this->categorias = Categoria::where('modalidades_id', $this->modalidad)->get();
        }else{
            $this->categorias = null;
            $this->categoriasAtleta = null;
        }
    }

    protected $rulesInscripcion = [
        'modalidad'     =>      'required',
        'banco'         =>      'required',
        'tipoPago'      =>      'required',
        'fechaPago'     =>      'required',
        'comprobante'   =>      'required|regex:/[0-9]/|digits_between:6,8',
        'monto'         =>      'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
        'categoriasAtleta' =>   'required'
    ];

    protected $messagesInscripcion = [
        'categoriasAtleta.required' => 'Se debe elegir al menos una categoria.'
    ];

    public function categoriasParticipante($categoria)
    {
        $categorias = [];
        if (!leerJson($this->categoriasAtleta, $categoria)){
            $categorias = json_decode($this->categoriasAtleta, true);
            $categorias[$categoria] = true;
            $categorias = json_encode($categorias);
        }else{
            $categorias = json_decode($this->categoriasAtleta, true);
            unset($categorias[$categoria]);
            $categorias = json_encode($categorias);
        }
        $this->categoriasAtleta = $categorias;
    }

    public function storeIncripcion()
    {

        $this->validate($this->rulesInscripcion, $this->messagesInscripcion);

        $participante = new Particiante();
        $participante->eventos_id = $this->evento_id;
        $participante->modalidades_id = $this->modalidad;
        $participante->atletas_id = $this->atleta_id;
        $participante->categorias = $this->categoriasAtleta;
        $participante->save();

        $pago = new Pago();
        $pago->comprobante = $this->comprobante;
        $pago->banco = $this->banco;
        $pago->tipo = $this->tipoPago;
        $pago->fecha = $this->fechaPago;
        $pago->monto = $this->monto;
        $pago->eventos_id = $this->evento_id;
        $pago->atletas_id = $this->atleta_id;
        $pago->save();

        $this->participante_id = $participante->id;
        $this->pago_id = $pago->id;
        $this->estatusPago = 0;

        $this->alert(
            'success',
            'Datos Guardados'
        );

    }

    public function updateIncripcion()
    {
        $this->validate($this->rulesInscripcion, $this->messagesInscripcion);

        $participante = Particiante::find($this->participante_id);
        $participante->eventos_id = $this->evento_id;
        $participante->modalidades_id = $this->modalidad;
        $participante->atletas_id = $this->atleta_id;
        $participante->categorias = $this->categoriasAtleta;
        $participante->update();

        $pago = Pago::find($this->pago_id);
        $pago->comprobante = $this->comprobante;
        $pago->banco = $this->banco;
        $pago->tipo = $this->tipoPago;
        $pago->fecha = $this->fechaPago;
        $pago->monto = $this->monto;
        $pago->eventos_id = $this->evento_id;
        $pago->atletas_id = $this->atleta_id;
        $pago->estatus = 0;
        $pago->update();

        $this->estatusPago = 0;

        $this->alert(
            'success',
            'Datos Guardados'
        );
    }


}
