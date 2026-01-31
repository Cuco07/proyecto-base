<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Impuesto;

class ImpuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $impuestos = Impuesto::all();
        return view('impuestos.index', compact('impuestos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('impuestos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'porcentaje' => 'required|numeric'
        ]);

        Impuesto::create($request->all());

        return redirect()->route('impuestos.index')
            ->with('success','Impuesto creado correctamente');
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
    public function edit( $id)
    {
        $impuesto = Impuesto::findOrFail($id);
        return view('impuestos.edit', compact('impuesto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'nombre' => 'required',
            'porcentaje' => 'required|numeric'
        ]);

        $impuesto = Impuesto::findOrFail($id);
        $impuesto->update($request->all());

        return redirect()->route('impuestos.index')
            ->with('success','Impuesto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Impuesto::findOrFail($id)->delete();
        return redirect()->route('impuestos.index')
            ->with('success','Impuesto eliminado');
    }
}
