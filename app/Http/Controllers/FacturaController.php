<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\estado;
use App\Models\factura;
use App\Models\modopago;
use App\Models\detallefactura;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\producto;


class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = factura::all();
        return view('factura.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    
    {
        $clientes = cliente::all();
        $estados = estado::all();
        $idmodopagos = modopago::all();
        $productos = \App\Models\Producto::with('estado')->get();

        return view('factura.crear', compact('clientes','estados','idmodopagos','productos'));

    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // 1. Validación de datos
    $request->validate([
        'idcliente'   => 'required|exists:clientes,id',
        'idmodopago'  => 'required|exists:modopagos,id',
        'fecha'       => 'required|date',
        'subtotal'    => 'required|numeric|min:0',
        'impuestos'   => 'required|numeric|min:0',
        'total'       => 'required|numeric|min:0',
        'producto_id' => 'required|exists:productos,id',
        'cantidad'    => 'required|numeric|min:1',
    ]);

    // 2. Buscar el producto seleccionado
    $producto = \App\Models\Producto::findOrFail($request->producto_id);

    // 3. Traducir estado numérico a texto
    $descripcion = $producto->estado == 1 ? 'Activo' : 'Inactivo';

    // 4. Buscar el estado en la tabla estados
    $estado = \App\Models\Estado::where('descripcion', $descripcion)->first();

    // 5. Validar que el estado exista
    if (!$estado) {
        return back()->withErrors([
            'estado' => 'El estado "' . $descripcion . '" del producto no existe en la tabla estados'
        ]);
    }

    // 6. Crear la factura
    $factura = \App\Models\Factura::create([
        'idcliente'  => $request->idcliente,
        'idmodopago' => $request->idmodopago,
        'fecha'      => $request->fecha,
        'subtotal'   => $request->subtotal,
        'impuestos'  => $request->impuestos,
        'total'      => $request->total,
        'idestado'   => $estado->id,
    ]);

    $totallinea = $request->cantidad * $producto->precio;

    // 7. Crear el detalle de factura
    \App\Models\DetalleFactura::create([
        'idfactura'  => $factura->id,
        'idproducto' => $request->producto_id,
        'cantidad'    => $request->cantidad,
        'preciounitario'=> $producto->precio,
        'totallinea'    => $totallinea, 
    ]);

    // 8. Redirigir con mensaje de éxito
    return redirect()->route('factura.index')->with('success', 'Factura creada correctamente');
}

    public function show($id)
    {
        $factura = factura::with([
            'cliente',
            'estado',
            'modopago',
            'detallefactura.producto' // Incluye los productos
        ])->findOrFail($id);

        $pdf = Pdf::loadView('factura.pdf', compact('factura'));
        return $pdf->stream('factura_' . $factura->id . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $factura = factura::find($id);
        $clientes = cliente::all();
        $estados = estado::all();
        $idmodopagos = modopago::all();

        return view('factura.editar', compact('factura','clientes','estados','idmodopagos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $request->validate([
        'fecha' => 'required|min:3|max:255',
        'subtotal' => 'required|min:3|max:255',
        'impuestos' => 'required|min:3|max:255',
        'total' => 'required|min:3|max:255',
    ]);
        factura::find($id)->update($request->all());
        return redirect()->route('factura.index')->with('success', 'Factura Actualizada Correctamente ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        factura::find($id)->delete();
        return redirect()->route('factura.index')->with('success','Factura Elimida Correctamente ya llorelo');
    }
}
