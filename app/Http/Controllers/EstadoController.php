<?php

namespace App\Http\Controllers;

use App\Models\estado;
use App\Models\modopago;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = estado::all();
        return view('estado.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estado.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   
{
    $request->validate([
        'descripcion' => 'required|string|max:255',
    ]);

    estado::create([
        'descripcion' => $request->descripcion,
    ]);

    return redirect()->route('estado.index')->with('success', 'Estado creado correctamente.');
}
    /**
     * Display the specified resource.
     */
    public function show(estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estados = estado::find($id);
        return view('estado.editar', compact('estados') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        estado::find($id)->update($request->all());
        return redirect()->route('estado.index')->with('succes','Estado Actualizado Correctamente');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        estado::find($id)->delete();
        return redirect()->route('estado.index')->with('success','Registro Eliminado Correctamente');

    }
}
