<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

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
        $cliente = Cliente::where('correo', $request->input('correo'))->first();

        // Si el cliente no existe, crear uno nuevo
        if (!$cliente) {
            $cliente = new Cliente();
            $cliente->nombre = $request->input('nameUser');
            $cliente->apellido = $request->input('lastName');
            $cliente->correo = $request->input('correo');
            $cliente->save();
        }

        // Crear la cita asociada al cliente
        $cita = new Cita();
        $cita->fecha_cita = $request->input('fecha');
        $cita->hora_cita = $request->input('hora');
        $cita->estado = "por atender";
        $cita->id_cliente = $cliente->id;
        $cita->id_servicio = $request->input('servicio');
        ;

        $cita->save();

        return redirect()->back()->with('success', 'creado');
    }

    public function update(Request $request, $id)
    {

        $cita = Cita::findOrFail($id);

        $cita->estado = $request->get('estado');

        $cita->save();


        return redirect()->back()->with('update', ' ');
    }
}
