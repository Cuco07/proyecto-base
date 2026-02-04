<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FacturaPdfController extends Controller
{
    /**
     * Genera la factura en PDF.
     */
    public function exportarPdf($id)
    {
        $factura = Factura::with([
            'cliente',
            'estado',
            'modopago',
            'detallefacturas.producto.impuesto'
        ])->findOrFail($id);

        $subtotal = 0;
        $impuestos = 0;

        foreach ($factura->detallefacturas as $d) {
            $linea = $d->cantidad * $d->preciounitario;
            $subtotal += $linea;

           $porcentaje = $d->producto->impuesto->porcentaje ?? 0;
           $impuestos += $linea * ($porcentaje / 100);
        }

        $total = $subtotal + $impuestos;

        $pdf = PDF::loadView('factura.pdf', compact('factura',
            'factura','subtotal','impuestos','total'));

        return $pdf->stream('factura_' . $factura->id . '.pdf');
    }
}
