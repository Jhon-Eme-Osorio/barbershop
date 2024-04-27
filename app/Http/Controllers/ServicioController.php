<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;


class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('dashboard/servicios')->with('servicios',$servicios);
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
        try {
        $servicioData =$request->validate([
            'nombre' => 'required|string',
            'duracion' => 'required|numeric',
            'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'descripcion' => 'required|string',

        ],[
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre del servicio debe ser una cadena de texto.',
    
            'duracion.required' => 'El campo duración es obligatorio.',
            'duracion.numeric' => 'El campo duración debe ser un número.',
    
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.regex' => 'El campo precio debe ser un número decimal con hasta dos dígitos decimales.',
    
            'descripcion.required' => 'El campo comentario es obligatorio.',
            'descripcion.string' => 'El campo comentario debe ser una cadena de texto.',    
        ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Captura la excepción de validación
           // return redirect()->route('servicios.index')->with('servicio', 'error');
           return redirect()->back()->withInput()->withErrors($e->validator->errors())->with('servicio', 'error');

           

        }

        Servicio::create($servicioData);


        return redirect()->back()->with('success','creado');

    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

            $servicio = Servicio::findOrFail($id);

            $servicio->nombre = $request->get('nombre');
            $servicio->duracion = $request->get('duracion');
            $servicio->precio = $request->get('precio');
            $servicio->descripcion = $request->get('descripcion');

            $servicio->save();
    
    
            return redirect()->back()->with('update',' ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id);

        $servicio->delete();
        return redirect()->route('servicios.index')->with('eliminar', 'Eliminado');
    }
}
