<?php

namespace App\Http\Livewire;

use App\Models\Atleta;
use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class AtletasComponent extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $listaAtletas, $busqueda;
    public $email, $password, $registrarUsuario = true;
    public $cedula, $users_id, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $sexo, $fechaNac, $pais,
        $telefonoCelular, $clubes, $tallaFranela, $pathFoto, $direccion, $telefonoResidencia, $grupoSanguineo,
        $alergico = "NO", $alergias, $contactoEmergencia, $telefonoEmergencia, $antecedentesMedicos = "NO", $observaciones;
    public $listaClub = [], $registrarClub = false, $nombreClub, $atleta_id = null;
    public $photo, $path, $guardarFoto = false;
    public $viewInscripcion = 'inscripcion', $evento_id, $nombreEvento, $fechaEvento, $horaVento, $horaEvento, $lugarEvento,
        $listaModalidades = [], $modalidad, $categorias, $categoriasAtleta;

    public function mount(Request $request)
    {
        if (!is_null($request->buscar)){
            $this->busqueda = $request->buscar;
        }
    }

    public function render()
    {
        $this->listaAtletas = Atleta::buscar($this->busqueda)->latest()->take(30)->get();
        //$this->verPlanilla();
        return view('livewire.atletas-component');
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

    public function generarClave()
    {
        $this->password = Str::random(8);
    }


    public function verPlanilla($id = null)
    {
        $atleta = Atleta::where('users_id', $id)->first();
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
            $this->registrarUsuario = false;

        }else{
            $this->limpiar();
        }


        $this->listaClub = $this->listaClubes();

    }

    public function limpiar()
    {
        $this->atleta_id = null;
        $this->cedula = null;
        $this->primerNombre = null;
        $this->segundoNombre = null;
        $this->primerApellido = null;
        $this->segundoApellido = null;
        $this->sexo = null;
        $this->fechaNac = null;
        $this->pais = null;
        $this->telefonoCelular = null;
        $this->clubes = null;
        $this->tallaFranela = null;
        $this->direccion = null;
        $this->telefonoResidencia = null;
        $this->grupoSanguineo = null;
        $this->alergico = null;
        $this->alergias = null;
        $this->contactoEmergencia = null;
        $this->telefonoEmergencia = null;
        $this->antecedentesMedicos = null;
        $this->observaciones = null;
        $this->registrarUsuario = true;
    }

    protected function rules()
    {
        return [
            'cedula' => ['required', 'numeric', 'digits_between:6,8', 'integer',
                Rule::unique('atletas', 'cedula')->ignore($this->atleta_id, 'users_id')],
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
            'contactoEmergencia'    => 'nullable',
            'telefonoEmergencia'    => 'nullable|regex:/[0-9]{9}/',
            'nombreClub'            =>  'required_if:registrarClub,true|unique:clubes,nombre',
            'alergias'              =>  'required_if:alergico,SI',
            'observaciones'         =>  'required_if:antecedentesMedicos,SI',
            'email'                 =>  ['nullable','required_if:registrarUsuario,true', 'email', Rule::unique('users')],
            'password'              =>  'nullable|required_if:registrarUsuario,true|min:8'
        ];
    }

    protected $messages = [
        'fechaNac.required'         =>  'El campo F. Nacimiento es obligatorio.',
        'nombreClub.required_if'    =>  'El campo nombre club es obligatorio cuando club es POR ASIGNAR.',
        'email.required_if'         => 'El campo email es obligatorio.',
        'password.required_if'      => 'El campo password es obligatorio.',
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

        if ($this->registrarUsuario){
            $user = new User();
            $user->name = strtoupper($this->primerNombre." ".$this->primerApellido);
            $user->email = $this->email;
            $user->password = Hash::make($this->password);
            $user->save();
            $this->users_id = $user->id;
        }

        $atleta = new Atleta();
        $atleta->cedula = $this->cedula;
        $atleta->users_id = $this->users_id;
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
        $this->verPlanilla($this->atleta_id);

        $this->alert(
            'success',
            'Datos Guardados'
        );

    }

    public function verFoto($id = null)
    {
        $atleta = Atleta::where('id', $id)->first();
        if ($atleta){
            //registrado
            $this->atleta_id = $id;
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
        $this->verFoto($this->atleta_id);

        $this->alert(
            'success',
            'Foto Guardada'
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
        $this->verPlanilla($this->atleta_id);

        $this->alert(
            'success',
            'Cambios Guardados'
        );

    }




}
