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
            'detallefacturas.producto'
        ])->findOrFail($id);

        $pdf = PDF::loadView('factura.pdf', compact('factura'));

        return $pdf->stream('factura_' . $factura->id . '.pdf');
    }
}
 