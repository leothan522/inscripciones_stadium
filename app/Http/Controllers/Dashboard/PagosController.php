<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function index()
    {
        return view('dashboard.pagos.pagos');
    }

}
