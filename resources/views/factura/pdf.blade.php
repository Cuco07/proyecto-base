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
            width: 40%;
            float: right;
        }

        .logo {
            width: 80px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    {{-- ENCABEZADO --}}
    <div style="text-align: center; margin-bottom: 20px;">
        <div style="display: flex; align-items: center; justify-content: center;">
            <img src="{{ public_path('vendor/adminlte/dist/img/DORAPAN.jpeg') }}"
                 alt="Logo"
                 style="height: 100px; width: 100px; margin-right: 10px;">
            <h1 style="margin: 0; font-size: 24px;">DORAPAN</h1>
        </div>
        <p><strong>NIT:</strong> 900123456-7</p>
        <h1>Factura de Venta #{{ $factura->id }}</h1>
    </div>

    {{-- DATOS DE LA FACTURA --}}
    <table style="border: none;">
        <tr>
            <td><strong>Cliente:</strong>
                {{ $factura->cliente->nombre }} {{ $factura->cliente->apellido }}
            </td>
            <td><strong>Fecha:</strong>
                {{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y H:i') }}
            </td>
        </tr>
        <tr>
            <td><strong>Estado:</strong> {{ $factura->estado->descripcion }}</td>
            <td><strong>Modo de Pago:</strong> {{ $factura->modopago->nombre }}</td>
        </tr>
    </table>

    {{-- DETALLE DE PRODUCTOS --}}
    <h3>Detalle de Productos</h3>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-right">Precio Unitario</th>
                <th class="text-right">Total Línea</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($factura->detallefacturas as $detalle)
<tr>
    <td>{{ $detalle->producto->nombre }}</td>

    <td style="text-align: center;">
        {{ $detalle->cantidad }}
    </td>

    <td style="text-align: right;">
        ${{ number_format($detalle->preciounitario, 0, ',', '.') }}
    </td>

    <td style="text-align: right;">
        ${{ number_format($detalle->cantidad * $detalle->preciounitario, 0, ',', '.') }}
    </td>
</tr>
@endforeach
        </tbody>
    </table>

    {{-- RESUMEN --}}
    <div class="summary">
        <table>
            <tr>
                <td><strong>Subtotal:</strong></td>
                <td class="text-right">
                    ${{ number_format($subtotal, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td><strong>Impuestos:</strong></td>
                <td class="text-right">
                    ${{ number_format($impuestos, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td><strong>Total:</strong></td>
                <td class="text-right">
                    <strong>${{ number_format($total, 0, ',', '.') }}</strong>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>



