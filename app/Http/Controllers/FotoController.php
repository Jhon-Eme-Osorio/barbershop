<?php

namespace App\Http\Controllers;

use App\Models\Galeria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos = view('dashboard.galeria', ['galeria' => Galeria::get()]);
        return $fotos;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* $request->validate(
            ['imagen' => 'required|image']
        );
        $imagenes = $request->file('imagen')->store('public/imagenes/galeria');

        $url = Storage::url($imagenes);

        Galeria::create([

            'nombre' => $url
        ]); */


        $totalRegistros = Galeria::count();
        // Verifica si el número de ejecuciones es menor o igual a 2
        if ($totalRegistros < 3) {



            try {
                $request->validate([
                    'imagen' => 'required|image'
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                // Captura la excepción de validación
                return redirect()->route('galeria.index')->with('imagen', 'success');
            }


            $imagen = $request->file('imagen')->store('public/imagenes/galeria');

            $url = Storage::url($imagen);

            Galeria::create([
                'nombre' => $url
            ]);

            return redirect()->route('galeria.index')->with('success', 'success');
        }

        return redirect()->route('galeria.index')->with('danger', 'success');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'imagen' => 'required|image'
        ]);

        $galeria = Galeria::findOrFail($id);

        $imagenActualPath = str_replace('storage', 'public', $galeria->nombre);

        if ($galeria->nombre && Storage::exists($imagenActualPath)) {
           
            Storage::delete($imagenActualPath);


        }


        $imagen = $request->file('imagen')->store('public/imagenes/galeria');


        $url = Storage::url($imagen);

        $galeria->update([
            'nombre' => $url
        ]);

        return redirect()->back()->with('Actualizado', 'Imagen actualizada exitosamente.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $galeria = Galeria::find($id);

        $url = str_replace('storage', 'public', $galeria->nombre);

        Storage::delete($url);

        $galeria->delete();

        return redirect()->route('galeria.index')->with('eliminar', 'Eliminado');
    }
}
