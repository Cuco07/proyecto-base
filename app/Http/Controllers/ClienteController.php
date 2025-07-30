<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
             $clientes = cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nombre' => 'required|min:3|max:255',
            'apellido' => 'required|min:3|max:255',
            'direccion' => 'required|min:3|max:255',
            'fechanacimiento' => 'required|min:3|max:255',
            'telefono' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255',
            'fecharegistro' => 'required|min:3|max:255',
        ]);
        cliente::create($request->all());
        return redirect()->route('cliente.index')->with('success','Registro Creado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = cliente::find($id);
        return view('cliente.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = cliente::find($id);
        $cliente->update($request->all());
        return redirect()->route('cliente.index')->with('success','Registro Actualizo Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        cliente::find($id)->delete();
        return redirect()->route('cliente.index')->with('success','Registro Eliminado Correctamente');
    
    }
}
