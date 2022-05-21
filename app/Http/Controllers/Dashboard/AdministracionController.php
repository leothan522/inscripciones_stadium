<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    public function eventos()
    {
        return view('dashboard.administracion.eventos');
    }

    public function atletas()
    {
        return view('dashboard.administracion.atletas');
    }
}
