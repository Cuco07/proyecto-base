@extends('adminlte::page')

@section('title', 'PROYECTO BASE')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('factura.index') }}" class="btn btn-indigo rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../vendor/adminlte/dist/img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            FACTURAS
        </h1>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-indigo">
            <div class="card-header text-center">
                <h5 class="m-0"><i class="fas fa-list-alt"></i> NUEVA FACTURA</h5>
            </div>

            <div class="card-body">

                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <form action="{{ route('factura.store') }}" method="POST">
                    @csrf

                    <!-- Cliente -->
                    <label for="idcliente" class="form-label">Cliente</label>
                    <select name="idcliente" id="idcliente" class="form-control" required>
                        <option value="">Seleccione un cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>

                    <!-- Producto -->
                    <label for="producto_id" class="form-label mt-3">Producto</label>
                    <select name="producto_id" id="producto_id" class="form-control" required>
                        <option value="">Seleccione un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}"
                                data-precio="{{ $producto->precio }}"
                                data-estado="{{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}">
                                {{ $producto->nombre }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Estado del producto (visual) -->
                    <label for="estado_producto" class="form-label mt-3">Estado del Producto</label>
                    <input type="text" id="estado_producto" class="form-control" readonly>

                    <!-- Cantidad -->
                    <label for="cantidad" class="form-label mt-3">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" required>





                    <!-- Fecha -->
                    <label for="fecha" class="form-label mt-3">Fecha de Creación</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>

                    <!-- Modo de Pago -->
                    <label for="idmodopago" class="form-label mt-3">Modo de Pago</label>
                    <select name="idmodopago" id="idmodopago" class="form-control" required>
                        <option value="">Seleccione un modo de pago</option>
                        @foreach ($idmodopagos as $modopago)
                            <option value="{{ $modopago->id }}">{{ $modopago->nombre }}</option>
                        @endforeach
                    </select>

                    <!-- Subtotal -->
                    <label for="subtotal" class="form-label mt-3">Subtotal</label>
                    <input type="number" step="0.01" name="subtotal" id="subtotal" class="form-control" readonly>

                    <!-- Impuestos -->
                    <label for="impuestos" class="form-label mt-3">Impuestos (19%)</label>
                    <input type="number" step="0.01" name="impuestos" id="impuestos" class="form-control" readonly>

                    <!-- Total -->
                    <label for="total" class="form-label mt-3">Total</label>
                    <input type="number" step="0.01" name="total" id="total" class="form-control" readonly>

                    <div class="text-center">
                        <button type="submit" class="btn btn-indigo rounded-pill px-4 mt-4">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Aceptar',
            timer: 3000
        });
    });
</script>
@endif
@stop

@section('css')
<style>
    .btn-indigo {
        background-color: #6610f2;
        color: white;
        border: none;
    }
    .btn-indigo:hover {
        background-color: #520dc2;
        color: white;
    }
    .main-sidebar {
        background-image: url('https://www.transparenttextures.com/patterns/concrete-wall.png');
        background-color: #dfe0e7e0;
        background-repeat: repeat;
        background-size: auto;
    }
</style>
@stop

@section('js')
<script>
    const productoSelect = document.getElementById('producto_id');
    const cantidadInput = document.getElementById('cantidad');

    productoSelect.addEventListener('change', actualizarFactura);
    cantidadInput.addEventListener('input', actualizarFactura);

    function actualizarFactura() {
        const selected = productoSelect.options[productoSelect.selectedIndex];
        const precio = parseFloat(selected.getAttribute('data-precio')) || 0;
        const estado = selected.getAttribute('data-estado') || '';
        const cantidad = parseFloat(cantidadInput.value) || 0;

        document.getElementById('estado_producto').value = estado;

        if (precio > 0 && cantidad > 0) {
            const subtotal = precio * cantidad;
            const impuestos = subtotal * 0.19;
            const total = subtotal + impuestos;

            document.getElementById('subtotal').value = subtotal.toFixed(2);
            document.getElementById('impuestos').value = impuestos.toFixed(2);
            document.getElementById('total').value = total.toFixed(2);
        } else {
            document.getElementById('subtotal').value = '';
            document.getElementById('impuestos').value = '';
            document.getElementById('total').value = '';
        }
    }
</script>
@stop