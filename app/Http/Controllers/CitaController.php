<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Notifications\BARBERSHOP;
use App\Notifications\CitaCanceladaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Cliente;
use App\Models\cita;

class CitaController extends Controller
{

    public function index()
    {
        $citas = Cita::latest()->get();
        $servicios = Servicio::all();
        return view('dashboard/citas', compact('citas', 'servicios'));
    }


    public function guardarCita(Request $request)
    {


        try {
            $request->validate([
                'correo' => 'required|email',
                'nameUser' => 'required',
                'lastName' => 'required',
                'fecha' => 'required',
                'hora' => 'required',
                'servicio' => 'required'
            ], [
                'correo.required' => 'El campo correo es obligatorio.',
                'correo.email' => 'Ingrese un correo valido.',
                'nameUser.required' => 'El campo nombre es obligatorio.',
                'lastName.required' => 'El campo apellido es obligatorio.',
                'fecha.required' => 'El campo fech es obligatorio.',
                'hora.required' => 'El campo hora es obligatorio.',
                'servicio.required' => 'El campo servico es obligatorio.',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Captura la excepción de validación
            return redirect()->back()->withInput()->withErrors($e->validator->errors())->with('sections', 'error');



        }

        // Verificar si el cliente ya existe
        $cliente = Cliente::where('email', $request->input('correo'))->first();

        // Si el cliente no existe, crear uno nuevo
        if (!$cliente) {
            $cliente = new Cliente();
            $cliente->nombre = $request->input('nameUser');
            $cliente->apellido = $request->input('lastName');
            $cliente->email = $request->input('correo');
            $cliente->save();
        }

        $servicioCliente = Servicio::find($request->input('servicio'));
        $duracionServicio = $servicioCliente->duracion;

        $hora = $request->input('hora');
        $horaFinCita = date('H:i', strtotime("$hora + $duracionServicio minutes"));

        // Crear la cita asociada al cliente
        $cita = new Cita();
        $token = Str::random(10);
        $cita->fecha_cita = $request->input('fecha');
        $cita->hora_cita = $request->input('hora');
        $cita->hora_fin_cita = $horaFinCita;
        $cita->estado = "por atender";
        $cita->id_cliente = $cliente->id;
        $cita->id_servicio = $request->input('servicio');
        $cita->token = $token;

        $cita->save();
        $nombre = $request->input('nameUser')." ".$request->input('lastName');


        
        $nombreServicio = $servicioCliente->nombre;

        

        


        $hora = ($hora < 12) ? $hora.' AM' : $hora.' PM';
        
        //$cliente->notify(new BARBERSHOP($nombre, $request->input('fecha'), $hora , $nombreServicio, $token) );
        return redirect()->back()->with('success', 'creado');
    }

    public function update(Request $request, $id)
    {

        $cita = Cita::findOrFail($id);
        $cliente = Cliente::findOrFail($cita->id_cliente);
        $nombre = $cliente->nombre.' '.$cliente->apellido;
        

        $cita->estado = $request->get('estado');

        $cita->save();
        
        if ($cita->estado == 'cancelado'){
            //$cliente->notify(new CitaCanceladaNotification($nombre) );
        }

        return redirect()->back()->with('update', ' ');
    }

    public function cancelarCita(Request $request, $token)
    {
        // Buscar la cita en la base de datos utilizando el token
        $cita = Cita::where('token', $token)->first();

        if (!$cita) {
            // Si no se encuentra la cita asociada al token, redirecciona a una página de error o muestra un mensaje de error
            return redirect()->route('home.sections')->with(' ', 'El token de cancelación no es válido.');
        }

        if($cita->estado == 'cancelado' || $cita->estado == 'atendido'){
            return redirect()->route('home.sections')->with('sin_cita', 'No tienes cita para cancelar.');
        }
        
        $cita->estado = 'cancelado';
        $cita->save();

        return redirect()->route('cancelaCita')->with('cita_cancelada', 'La cita ha sido cancelada correctamente.');
    }
}
