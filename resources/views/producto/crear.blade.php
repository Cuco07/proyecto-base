@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('producto.index') }}" class="btn btn-secondary rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../vendor/adminlte/dist/img/DORAPAN.png" alt="Logo"
                style="height: 90px; width: 90px; vertical-align: middle; margin-right: 10px;">
            PRODUCTOS
        </h1>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-secondary">

            <div class="card-header text-center">
                <h5 class="m-0">
                    <i class="fas fa-list-alt"></i> CREAR PRODUCTO
                </h5>
            </div>

            <div class="card-body">
                <form action="{{ route('producto.store') }}" method="POST">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                    </div>

                    {{-- Descripción --}}
                    <div class="mb-3">
                        <label>Descripción</label>
                        <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}">
                    </div>

                    {{-- Precio Compra --}}
                    <div class="mb-3">
                        <label>Precio Compra</label>
                        <input type="number" step="0.01" name="preciocompra" id="preciocompra"
                               class="form-control" value="{{ old('preciocompra') }}">
                    </div>

                    {{-- Subtotal --}}
                    <div class="mb-3">
                        <label>Subtotal</label>
                        <input type="text" id="subtotal" class="form-control" readonly>
                    </div>

                    {{-- Impuesto --}}
                    <div class="mb-3">
                        <label>Impuesto IVA</label>
                        <select name="impuesto_id" id="impuesto" class="form-control">
                            <option value="">Seleccione impuesto</option>
                            @foreach($impuestos as $i)
                                <option value="{{ $i->id }}" data-porcentaje="{{ $i->porcentaje }}">
                                    {{ $i->nombre }} ({{ $i->porcentaje }}%)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- IVA --}}
                    <div class="mb-3">
                        <label>IVA</label>
                        <input type="text" id="iva" class="form-control" readonly>
                    </div>

                    {{-- Total --}}
                    <div class="mb-3">
                        <label>Total</label>
                        <input type="text" id="total" class="form-control" readonly>
                    </div>

                    {{-- Stock --}}
                    <div class="mb-3">
                        <label>Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
                    </div>

                    {{-- Fecha --}}
                    <div class="mb-3">
                        <label>Fecha de Creación</label>
                        <input type="date" name="fechacreacion" class="form-control"
                               value="{{ old('fechacreacion') }}">
                    </div>

                    {{-- Estado --}}
                    <div class="mb-3">
                        <label>Estado</label>
                        <select name="estado" class="form-control">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    {{-- Marca --}}
                    <div class="mb-3">
                        <label>Marca</label>
                        <select name="idmarca" class="form-control">
                            <option value="">Seleccione marca</option>
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Categoría --}}
                    <div class="mb-3">
                        <label>Categoría</label>
                        <select name="idcategoria" class="form-control">
                            <option value="">Seleccione categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-secondary rounded-pill px-4 mt-3">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const precioCompra = document.getElementById('preciocompra');
    const impuesto = document.getElementById('impuesto');

    precioCompra.addEventListener('input', calcular);
    impuesto.addEventListener('change', calcular);

    function calcular() {
        let precio = parseFloat(precioCompra.value) || 0;

        let porcentaje = impuesto.options[
            impuesto.selectedIndex
        ]?.dataset.porcentaje || 0;

        porcentaje = parseFloat(porcentaje);

        let subtotal = precio;
        let iva = subtotal * (porcentaje / 100);
        let total = subtotal + iva;

        document.getElementById('subtotal').value = subtotal.toFixed(2);
        document.getElementById('iva').value = iva.toFixed(2);
        document.getElementById('total').value = total.toFixed(2);
    }
});
</script>
@endpush






