<?php

namespace App\Http\Controllers;

use App\Models\modopago;
use Illuminate\Http\Request;

class ModopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modopagos = modopago::all();
        return view("modopago.index", compact("modopagos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modopago = modopago::all();
        return view("modopago.crear", compact('modopago'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'nombre' => 'required|string|max:50',
        'descripcion' => 'required|string|max:255',
        'activo' => 'required|boolean',
    ]);

    Modopago::create($request->only('nombre', 'descripcion', 'activo'));
    return redirect()->route('modopago.index')->with('success','MODO DE PAGO CREADO CORRECTAMENTE');
}

    /**
     * Display the specified resource.
     */
    public function show(modopago $modopago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $modopago = modopago::find($id);
        return view('modopago.editar', compact('modopago'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
        'nombre' => 'required|string|max:50',
        'descripcion' => 'required|string|max:255',
        'activo' => 'required|boolean',
    ]);

        modopago::find($id)->update($request->all());
        return redirect()->route('modopago.index')->with('success', 'Registro Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id )
    {
         $modopago = modopago::find($id);

    if (!$modopago) {
        return redirect()->route('modopago.index')->with('error', 'Modo de pago no encontrado.');
    }

    $modopago->delete();

    return redirect()->route('modopago.index')->with('success', 'Registro eliminado correctamente');
    }
}
