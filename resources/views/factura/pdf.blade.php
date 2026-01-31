<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $factura->id }}</title>
    
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h1, h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #999;
            padding: 6px;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .summary {
            margin-top: 20px;
        }

        .logo {
            width: 80px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h1>Factura de Venta #{{ $factura->id }} </h1>

    <table style="width: 100%; border: none;">
    <tr>
       <div style="text-align: center; margin-bottom: 20px;">
    <div style="display: flex; align-items: center; justify-content: center;">
        <img src="{{ public_path('vendor/adminlte/dist/img/DORAPAN.jpeg') }}" alt="Logo"
             style="height: 100px; width: 100px; margin-right: 10px;">
        <h1 style="margin: 0; font-size: 24px;">DORAPAN</h1>
    </div>
        </div>
    <p style="text-align: center; margin-bottom: 20px;"><strong>NIT:</strong> 900123456-7</p>
</div>
</div>
    <table>
        <tr>
            <td><strong>Cliente:</strong> {{ $factura->cliente->nombre }} {{ $factura->cliente->apellido }}</td>
            <td><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <td><strong>Estado:</strong> {{ $factura->estado->descripcion }}</td>
            <td><strong>Modo de Pago:</strong> {{ $factura->modopago->nombre }}</td>
            
        </tr>
    </table>
        
    </tr>
</table>

    <h3>Detalle de Productos</h3>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total Línea</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factura->detallefacturas as $detalle)
                <tr>
                    <td>{{ $detalle->producto->nombre ?? 'N/A' }}</td>
                    <td class="text-center">{{ $detalle->cantidad }}</td>
                    <td class="text-right">${{ number_format($detalle->preciounitario, 0, ',', '.') }}</td>
                    <td class="text-right">${{ number_format($detalle->totallinea, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <table>
            <tr>
                <td><strong>Subtotal:</strong></td>
                <td class="text-right">${{ number_format($factura->subtotal, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Impuestos:</strong></td>
                <td class="text-right">${{ number_format($factura->impuestos, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Total:</strong></td>
                <td class="text-right"><strong>${{ number_format($factura->total, 0, ',', '.') }}</strong></td>
            </tr>
        </table>
    </div>

</body>


</html>


