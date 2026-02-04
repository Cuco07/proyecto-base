<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\marca;
use App\Models\producto;
use App\Models\Impuesto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $productos = Producto::with('impuesto')->get();
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = categoria::all();
        $marcas = marca::all();
        $impuestos = Impuesto::all();

        return view('producto.crear', compact('categorias', 'marcas','impuestos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|min:3|max:255',
        'descripcion' => 'required|string|min:3|max:255',

        
        'preciocompra' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',

        'fechacreacion' => 'required|date',
        'estado' => 'required|in:0,1',

        'idmarca' => 'required|exists:marcas,id',
        'idcategoria' => 'required|exists:categorias,id',
    ]);

    $impuesto = \App\Models\Impuesto::find($request->impuesto_id);

        $precioBase = $request->preciocompra;
        $porcentaje = $impuesto->porcentaje ?? 0;

        $precioFinal = $precioBase + ($precioBase * $porcentaje / 100);


    Producto::create([
    'nombre'        => $request->nombre,
    'descripcion'   => $request->descripcion,
    'preciocompra'  => $precioBase,          // precio sin IVA
    'precio'        => $precioFinal,          // precio con IVA
    'stock'         => $request->stock,
    'fechacreacion' => $request->fechacreacion,
    'estado'        => $request->estado,
    'idmarca'       => $request->idmarca,
    'idcategoria'   => $request->idcategoria,
    'impuesto_id'   => $request->impuesto_id,
]);

    return redirect()
        ->route('producto.index')
        ->with('success', 'Producto creado correctamente');
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
        return view('producto.editar', compact('producto', 'categorias', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $request->validate([
        'nombre'        => 'required|string|min:3|max:255',
        'descripcion'   => 'required|string|min:3|max:255',

        'precio'        => 'required|numeric|min:0',
        'preciocompra'  => 'required|numeric|min:0',
        'stock'         => 'required|integer|min:0',

        'fechacreacion' => 'required|date',
        'estado'        => 'required|in:0,1',

        'idmarca'       => 'required|exists:marcas,id',
        'idcategoria'   => 'required|exists:categorias,id',
        'impuesto_id'   => 'nullable|exists:impuestos,id',
    ]);

    $producto = Producto::findOrFail($id);

    $producto->update($request->only([
        'nombre',
        'descripcion',
        'precio',
        'preciocompra',
        'stock',
        'fechacreacion',
        'estado',
        'idmarca',
        'idcategoria',
        'impuesto_id',
    ]));

    return redirect()
        ->route('producto.index')
        ->with('success', 'Producto actualizado correctamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        producto::find($id)->delete();
        return redirect()->route('producto.index')->with('success', 'Registro Eliminado Correctamente');
    }
}
