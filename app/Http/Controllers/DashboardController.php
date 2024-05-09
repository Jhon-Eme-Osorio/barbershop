<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Galeria;
use App\Models\Horario;
use App\Models\Servicio;
use App\Models\Cita;

class DashboardController extends Controller
{
    public function index()
    {
        $servicios = Servicio::latest()->get();
        $galeria = Galeria::latest()->get();
        $horarios = Horario::latest()->get();
        $citas = Cita::all();
        $clientes = Cliente::all();

        return view('dashboard.index', compact('servicios', 'galeria', 'horarios', 'citas', 'clientes'));
    }
}
