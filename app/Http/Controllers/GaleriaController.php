<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use App\Models\Horario;
use App\Models\Servicio;
use App\Models\Cita;
use Illuminate\Http\Request;

use Carbon\Carbon;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::latest()->get();
        $galeria = Galeria::latest()->get();
        $horarios = Horario::latest()->get();

        return view('home.sections', compact('servicios', 'galeria', 'horarios'));
    }

    /* public function generarRangoHoras(Request $request)
{
    $citasProgramadas = [];
    

    // Obtener la fecha seleccionada
    $fechaSeleccionada = $request->input('dia');
    // Obtener el día de la semana correspondiente a la fecha seleccionada
    $diaSemana = Carbon::parse($fechaSeleccionada)->format('l');

    if ($diaSemana == 'Monday') {
        $diaSemana = 'Lunes';
    } else if ($diaSemana == 'Tuesday') {
        $diaSemana = 'Martes';
    } else if ($diaSemana == 'Wednesday') {
        $diaSemana = 'Miercoles';
    } else if ($diaSemana == 'Thursday') {
        $diaSemana = 'Jueves';
    } else if ($diaSemana == 'Friday') {
        $diaSemana = 'Viernes';
    } else if ($diaSemana == 'Saturday') {
        $diaSemana = 'Sabado';
    } else if ($diaSemana == 'Sunday') {
        $diaSemana = 'Domingo';
    }

    // Obtener el horario activo para el día de la semana seleccionado, si existe
    $horario = Horario::where('dia', $diaSemana)->where('activo', 1)->latest()->first();

    // Array para almacenar las horas disponibles
    $horas = [];

    // Si hay un horario activo para el día seleccionado
    if ($horario) {
        // Obtener las citas programadas para la fecha seleccionada
        $citasProgramadas = Cita::where('fecha_cita', $fechaSeleccionada)->pluck('hora_cita')->toArray();
        $aperturaManana = str_replace([" AM", " PM"], "", $horario->apertura_mañana);
        $cierreManana = str_replace([" AM", " PM"], "", $horario->cierre_mañana);
        $aperturaTarde = str_replace([" AM", " PM"], "", $horario->apertura_tarde);
        $cierreTarde = str_replace([" AM", " PM"], "", $horario->cierre_tarde);

        // Convertir las horas de apertura y cierre a formato Unix
        $horaInicioManana = strtotime($aperturaManana);
        $horaFinManana = strtotime($cierreManana);
        $horaInicioTarde = strtotime($aperturaTarde);
        $horaFinTarde = strtotime($cierreTarde);

        // Iterar sobre cada hora dentro del rango de la mañana
        while ($horaInicioManana < $horaFinManana) {
            // Agregar la hora al array en formato deseado (24 horas)
            //$horas[] = date('H:i', $horaInicioManana);
            // Verificar si la hora está disponible
            $horaActual = date('H:i', $horaInicioManana);
            if (!in_array($horaActual, $citasProgramadas)) {
                // Agregar la hora al array de horas disponibles
                $horas[] = $horaActual;
            }
            // Incrementar la hora en intervalos de 30 minutos
            $horaInicioManana = strtotime('+30 minutes', $horaInicioManana);
        }

        // Iterar sobre cada hora dentro del rango de la tarde
        while ($horaInicioTarde < $horaFinTarde) {
            // Agregar la hora al array en formato deseado (24 horas)
            //$horas[] = date('H:i', $horaInicioTarde);
            // Verificar si la hora está disponible
            $horaActual = date('H:i', $horaInicioTarde);
            if (!in_array($horaActual, $citasProgramadas)) {
                // Agregar la hora al array de horas disponibles
                $horas[] = $horaActual;
            }
            // Incrementar la hora en intervalos de 30 minutos
            $horaInicioTarde = strtotime('+30 minutes', $horaInicioTarde);
        }
        //$horas[] = date('H:i', $horaFinTarde);
    } else {
        return response()->json([
            'showAlert' => true,
            'message' => 'El día seleccionado no tiene servicio disponible'
        ]);
    }

    if (array_key_exists($fechaSeleccionada, $citasProgramadas)) {
        // Si hay citas programadas para esa fecha, eliminar las horas correspondientes del array $horas
        foreach ($citasProgramadas[$fechaSeleccionada] as $horaCita) {
            if (($key = array_search($horaCita, $horas)) !== false) {
                unset($horas[$key]);
            }
        }
    }


    // Devolver las horas disponibles y el día de la semana como respuesta JSON
    return response()->json(['horas' => $horas, 'diaSemana' => $diaSemana, 'fechaSeleccionada' => $fechaSeleccionada]);
}  */


public function generarRangoHoras(Request $request)
{
    $citasProgramadas = [];
    
    // Obtener la fecha seleccionada
    $fechaSeleccionada = $request->input('dia');
    // Obtener el día de la semana correspondiente a la fecha seleccionada
    $diaSemana = Carbon::parse($fechaSeleccionada)->format('l');

    if ($diaSemana == 'Monday') {
        $diaSemana = 'Lunes';
    } else if ($diaSemana == 'Tuesday') {
        $diaSemana = 'Martes';
    } else if ($diaSemana == 'Wednesday') {
        $diaSemana = 'Miércoles';
    } else if ($diaSemana == 'Thursday') {
        $diaSemana = 'Jueves';
    } else if ($diaSemana == 'Friday') {
        $diaSemana = 'Viernes';
    } else if ($diaSemana == 'Saturday') {
        $diaSemana = 'Sábado';
    } else if ($diaSemana == 'Sunday') {
        $diaSemana = 'Domingo';
    }

    // Obtener el horario activo para el día de la semana seleccionado, si existe
    $horario = Horario::where('dia', $diaSemana)->where('activo', 1)->latest()->first();

    // Array para almacenar las horas disponibles
    $horas = [];

    // Si hay un horario activo para el día seleccionado
    if ($horario) {
        // Obtener las citas programadas para la fecha seleccionada
        $citasProgramadas = Cita::where('fecha_cita', $fechaSeleccionada)->get();

        // Obtener hora_cita y hora_fin_cita de las citas programadas
        $horasOcupadas = [];
        foreach ($citasProgramadas as $cita) {
            $horasOcupadas = array_merge($horasOcupadas, $this->generarHorasIntermedias($cita->hora_cita, $cita->hora_fin_cita));
        }
        
        $aperturaManana = str_replace([" AM", " PM"], "", $horario->apertura_mañana);
        $cierreManana = str_replace([" AM", " PM"], "", $horario->cierre_mañana);
        $aperturaTarde = str_replace([" AM", " PM"], "", $horario->apertura_tarde);
        $cierreTarde = str_replace([" AM", " PM"], "", $horario->cierre_tarde);

        // Convertir las horas de apertura y cierre a formato Unix
        $horaInicioManana = strtotime($aperturaManana);
        $horaFinManana = strtotime($cierreManana);
        $horaInicioTarde = strtotime($aperturaTarde);
        $horaFinTarde = strtotime($cierreTarde);

        // Iterar sobre cada hora dentro del rango de la mañana
        while ($horaInicioManana < $horaFinManana) {
            $horaActual = date('H:i', $horaInicioManana);
            if (!in_array($horaActual, $horasOcupadas)) {
                $horas[] = $horaActual;
            }
            // Incrementar la hora en intervalos de 30 minutos
            $horaInicioManana = strtotime('+30 minutes', $horaInicioManana);
        }

        // Iterar sobre cada hora dentro del rango de la tarde
        while ($horaInicioTarde < $horaFinTarde) {
            $horaActual = date('H:i', $horaInicioTarde);
            if (!in_array($horaActual, $horasOcupadas)) {
                $horas[] = $horaActual;
            }
            // Incrementar la hora en intervalos de 30 minutos
            $horaInicioTarde = strtotime('+30 minutes', $horaInicioTarde);
        }
    } else {
        return response()->json([
            'showAlert' => true,
            'message' => 'El día seleccionado no tiene servicio disponible'
        ]);
    }

    // Devolver las horas disponibles y el día de la semana como respuesta JSON
    return response()->json(['horas' => $horas, 'diaSemana' => $diaSemana, 'fechaSeleccionada' => $fechaSeleccionada]);
}

// Función para generar un array de horas intermedias entre dos horas dadas
function generarHorasIntermedias($horaInicio, $horaFin)
{
    $horasIntermedias = [];
    $horaActual = strtotime($horaInicio);
    $horaFin = strtotime($horaFin);
    while ($horaActual < $horaFin) {
        $horasIntermedias[] = date('H:i', $horaActual);
        $horaActual = strtotime('+30 minutes', $horaActual);
    }
    return $horasIntermedias;
}

}
