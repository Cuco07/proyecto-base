<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $marcas = marca::all();
        return view('marca.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {               
        return view('marca.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {$request->validate([
        'nombre' => 'required|min:3|max:255',
        'descripcion' => 'required|min:3|max:255',
    ]);
     
    marca::create($request->all());
        return redirect()->route('marca.index')->with('success','Registro Creado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $marca = marca::find($id);
        return view('marca.editar', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'nombre' => 'required|min:3|max:255',
        'descripcion' => 'required|min:3|max:255',
     ]);
        marca::find($id)->update($request->all());
        return redirect()->route('marca.index')->with('success','Registro Actualizo Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        marca::find($id)->delete();
        return redirect()->route('marca.index')->with('success','Registro Eliminado Correctamente');
    }
}
