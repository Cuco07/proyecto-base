<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\estado;
use App\Models\factura;
use App\Models\modopago;
use App\Models\detallefactura;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
       
        return view('factura.crear', compact('clientes','estados','idmodopagos'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'fecha' => 'required|min:3|max:255',
        'subtotal' => 'required|min:3|max:255',
        'impuestos' => 'required|min:3|max:255',
        'total' => 'required|min:3|max:255',
    ]);

        Factura::create($request->validat());

        return redirect()->route('factura.index')->with('success','Factura Creada Correctamente');
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
