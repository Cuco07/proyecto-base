@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1>
            <img src="../../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            EDITAR DETALLE FACTURA
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



                <form action="{{route('detallefactura.update', $detallefactura->id)}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="idfactura" class="form-label">Factura</label>
                        <select name="idfactura" id="idfactura" class="form-control" required>
                            <option value="">-- Seleccione una factura --</option>
                            @foreach ($facturas as $factura)
                                <option value="{{ $factura->id }}" {{ $factura->id == $detallefactura->idfactura ? 'selected' : '' }}>
                                    Factura #{{ $factura->id }} - Cliente: {{ $factura->cliente->nombre  ?? 'Sin cliente' }} {{ $factura->cliente->apellido ?? '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="idproducto" class="form-label">Producto</label>
                        <select name="idproducto" id="idproducto" class="form-control" required>
                            <option value="">-- Seleccione un producto --</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" {{ $producto->id == $detallefactura->idproducto ? 'selected' : '' }}>
                                    {{ $producto->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <label for="cantidad" class="form-label">CANTIDAD</label>
                    <input type="number" name=cantidad id="cantidad" value="{{$detallefactura->cantidad}}"
                        class="form-control">

                    <label for="preciounitario" class="form-label">PRECIO UNITARIO</label>
                    <input type="number" name="preciounitario" id="preciounitario"
                        value="{{$detallefactura->preciounitario}}" class="form-control">

                    <label for="totallinea" class="form-label">TOTAL LINEA</label>
                    <input type="decimal" name="totallinea" id="totallinea" value="{{$detallefactura->totallinea}}"
                        class="form-control">

                    <div class="text-center">
                        <button type="submit" class="btn btn-success rounded-pill px-4 mt-4">
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
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop