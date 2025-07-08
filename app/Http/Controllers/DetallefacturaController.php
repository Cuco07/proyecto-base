<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\detallefactura;
use App\Models\estado;
use App\Models\factura;
use App\Models\modopago;
use App\Models\producto;
use Illuminate\Http\Request;

class DetallefacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detallefacturas = detallefactura::all();
        return view('detallefactura.index', compact('detallefacturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $facturas = factura::all();
        $productos = producto::all();

        return view('detallefactura.crear', compact('facturas','productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        detallefactura::create($request->all());

        return redirect()->route('detallefactura.index')->with('success','CREADO CORRECTAMENTE');
    }

    /**
     * Display the specified resource.
     */
    public function show(detallefactura $detallefactura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $detallefactura = DetalleFactura::find($id);
        $facturas = factura::all();
        $clientes = cliente::all();
        $estados = estado::all();
        $idmodopagos = modopago::all();
         $productos = Producto::all();
        return view('detallefactura.editar',compact('facturas','clientes','estados','idmodopagos','detallefactura','productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        detallefactura::find($id)->update($request->all());
        return redirect()->route('detallefactura.index')->with('success','DETALLE FACTURA ACTUALIZADO CORRECTAMENTE');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        detallefactura::find($id)->delete();
        return redirect()->route('detallefactura.index')->with('success','DETALLE FACTURA ELIMINADO CORRECTAMENTE');
     }
}
