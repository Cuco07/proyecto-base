<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\marca;
use App\Models\producto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = producto::all();
        return view('producto.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = categoria::all();
        $marcas = marca::all();

        return view('producto.crear',compact('categorias','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        producto::create($request->all());
         return redirect()->route('producto.index')->with('success','Registro Creado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = producto::find($id);
        $categorias = categoria::all();
        $marcas = marca::all();
        return view('producto.editar', compact('producto','categorias','marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        producto::find($id)->update($request->all());
        return redirect()->route('producto.index')->with('success','Registro Actualizo Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        producto::find($id)->delete();
        return redirect()->route('producto.index')->with('success','Registro Eliminado Correctamente');
    }
}