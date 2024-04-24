<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dias = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        
        $horarios = Horario::all();
        
         // Generar un array asociativo con los nombres de los días y su estado activo
    $estadoDias = [];
    foreach ($horarios as $horario) {
        $estadoDias[$horario->dia] = $horario;
    }

    return view('dashboard.horario', compact('horarios', 'dias', 'estadoDias'));
       


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Recoger los días del formulario
    $diasFormulario = $request->dias;

    foreach ($diasFormulario as $dia) {
        $nombreDia = $dia['dia'];

        // Verificar si el checkbox está activo o inactivo
        if (isset($dia['activo'])) {
            // El checkbox está activo, actualizar o crear el registro según sea necesario
            $horario = Horario::where('dia', $nombreDia)->first();

            if ($horario) {
                // El registro ya existe, actualizarlo
                $horario->update([
                    'apertura_mañana' => $dia['apertura_mañana'],
                    'cierre_mañana' => $dia['cierre_mañana'],
                    'apertura_tarde' => $dia['apertura_tarde'],
                    'cierre_tarde' => $dia['cierre_tarde'],
                    'activo' => true,
                ]);
            } else {
                // El registro no existe, crearlo
                Horario::create([
                    'dia' => $nombreDia,
                    'apertura_mañana' => $dia['apertura_mañana'],
                    'cierre_mañana' => $dia['cierre_mañana'],
                    'apertura_tarde' => $dia['apertura_tarde'],
                    'cierre_tarde' => $dia['cierre_tarde'],
                    'activo' => true,
                ]);
            }
        } else {
            // El checkbox está inactivo, actualizar el registro si existe
            $horario = Horario::where('dia', $nombreDia)->first();

            if ($horario) {
                // El registro existe, actualizarlo y desactivarlo
                $horario->update([
                    'activo' => false,
                ]);
            }
        }
    }

    // Redirigir a la vista con un mensaje de éxito
    return redirect()->route('horario.index')->with('success', 'Horarios actualizados exitosamente');
}






    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
