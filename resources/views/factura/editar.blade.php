@extends('adminlte::page')

@section('title', 'PROYECTO BASE')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('factura.index') }}" class="btn btn-indigo rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            EDITAR FACTURAS
        </h1>
    </div>
    
</div>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
       
        <div class="card card-indigo mt-4">
            <div class="card-header text-center">
                <div class="card-title w-100">
                    <h5 class="m-0">
                        <i class="fas fa-file-invoice-dollar mr-2"></i> EDITAR FACTURA
                    </h5>
                </div>
            </div>
            <div class="card-body">
           

                <form action="{{route('factura.update', $factura->id)}}" method="POST">

                    @csrf
                    <label for="idcliente" class="form-label">Cliente</label>
                    <select name="idcliente" id="idcliente" class="form-control">
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>

                    <label for="idestado" class="form-label">Estado</label>
                    <select name="idestado" id="idestado" class="form-control">
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                        @endforeach
                    </select>

                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="datetime" name="fecha" id="fecha" class="form-control"
                        value="{{ old('fecha', $factura->fecha) }}">

                    <label for="idmodopago" class="form-label">Modo de Pago</label>
                    <select name="idmodopago" id="idmodopago" class="form-control" required>
                        <option value="">Seleccione un modo de pago</option>
                        @foreach ($idmodopagos as $modopago)
                            <option value="{{ $modopago->id }}" {{ old('idmodopago', $modopago->idmodopago) == $modopago->id ? 'selected' : '' }}>
                                {{ $modopago->nombre }}
                            </option>
                        @endforeach
                    </select>

                    <label for="subtotal" class="form-label">Sub Total</label>
                    <input type="decimal" name="subtotal" id="subtotal" class="form-control"
                        value="{{$factura->subtotal}}">

                    <label for="impuestos" class="form-label">Impuestos</label>
                    <input type="decimal" name=impuestos id="impuestos" class="form-control"
                        value="{{$factura->impuestos}}">

                    <label for="total">Total</label>
                    <input type="decimal" name='total' id="total" class="form-control" value="{{$factura->total}}">

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
    .main-sidebar {
        background-image: url('https://www.transparenttextures.com/patterns/concrete-wall.png');
        background-color: #dfe0e7e0;
        background-repeat: repeat;
        background-size: auto;
    }
</style>
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
</style>
<style>
    .sidebar .nav-link {
        text-align: left !important;
    }
</style>
@stop

@section('js')

<script>
    function confirmarEliminacion(event) {
        event.preventDefault();
        const form = event.target.closest('form');

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
            }
        });
    });
</script>
@stop