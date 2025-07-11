@extends('adminlte::page')

@section('title', 'Crear Detalle Factura')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1>
            <img src="{{ asset('vendor/adminlte/dist/img/DORAPAN.png') }}" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            CREAR DETALLE FACTURA
        </h1>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('detallefactura.index') }}" class="btn btn-secondary rounded-pill px-4 mb-3">
            <i class="fas fa-arrow-left"></i> Volver
        </a>

        <div class="card card-primary mt-4">
            <div class="card card-dark">
                <div class="card-header text-center">
                    <h5 class="card-title m-0 w-100">
                        <i class="fas fa-clipboard-list"></i> DETALLE FACTURA
                    </h5>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('detallefactura.store') }}" method="POST">
                    @csrf

                    
                    <div class="mb-3">
                        <label for="idfactura" class="form-label">Factura</label>
                      <select name="idfactura" id="idfactura" class="form-control" required>
                          <option value="">-- Seleccione una factura --</option>
                          @foreach ($facturas as $factura)
                             <option value="{{ $factura->id }}" {{ old('idfactura') == $factura->id ? 'selected' : '' }}>
                           {{ $factura->nombre ?? 'factura: ' . $factura->cliente->nombre . ' ' . $factura->cliente->apellido}}
                          </option>
                             @endforeach
                        </select>
                    </div>

                    
                    <div class="mb-3">
                        <label for="idproducto" class="form-label">Producto</label>
                        <select name="idproducto" id="idproducto" class="form-control" required>
                            <option value="">-- Seleccione un producto --</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" {{ old('idproducto') == $producto->id ? 'selected' : '' }}>
                                    {{ $producto->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad') }}" class="form-control" required>
                    </div>

                    
                    <div class="mb-3">
                        <label for="preciounitario" class="form-label">Precio Unitario</label>
                        <input type="number" step="0.01" name="preciounitario" id="preciounitario" value="{{ old('preciounitario') }}" class="form-control" required>
                    </div>

                    
                    <div class="mb-3">
                        <label for="totallinea" class="form-label">Total Línea</label>
                       <input type="number" step="0.01" name="totallinea" id="totallinea" value="{{ old('totallinea') }}" class="form-control" readonly>
                    </div>

                     
                      <div class="text-center">
                        <button type="submit" class="btn btn-dark rounded-pill px-4 mt-4">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .sidebar .nav-link {
        text-align: left !important;
    }
</style>
@stop

@section('js')
<script>
    @section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cantidadInput = document.getElementById('cantidad');
        const precioInput = document.getElementById('preciounitario');
        const totalLineaInput = document.getElementById('totallinea');

        function calcularTotalLinea() {
            const cantidad = parseFloat(cantidadInput.value) || 0;
            const precio = parseFloat(precioInput.value) || 0;
            const total = cantidad * precio;
            totalLineaInput.value = total.toFixed(2);
        }

        cantidadInput.addEventListener('input', calcularTotalLinea);
        precioInput.addEventListener('input', calcularTotalLinea);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cantidadInput = document.getElementById('cantidad');
        const precioInput = document.getElementById('preciounitario');
        const totalLineaInput = document.getElementById('totallinea');

        function calcularTotalLinea() {
            const cantidad = parseFloat(cantidadInput.value) || 0;
            const precio = parseFloat(precioInput.value) || 0;
            const total = cantidad * precio;
            totalLineaInput.value = total.toFixed(2);
        }

        cantidadInput.addEventListener('input', calcularTotalLinea);
        precioInput.addEventListener('input', calcularTotalLinea);

        calcularTotalLinea(); // Calcula si hay valores al cargar
    });
</script>
@endsection

   
    console.log("Formulario de creación de detalle factura cargado");
</script>
@stop




