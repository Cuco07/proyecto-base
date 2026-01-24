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
            <img src="../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            FACTURAS
        </h1>
    </div>

</div>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-indigo ">

            <div class="card-indigo">
                <div class="card-header text-center">
                    <div class="card-title w-100">
                        <h5 class="m-0">
                            <i class="fas fa-list-alt"></i> NUEVA FACTURA
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('factura.store')}}" method="POST">

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

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de Creación</label>
                        <input type="date" name="fecha" id="fecha" class="form-control @error('fechacreacion') is-invalid
                        @enderror" placeholder=" fechacreacion" value="{{old('fecha')}}">
                        @error('fechacreacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="idmodopago" class="form-label"> Modo de Pago</label>
                        <select name="idmodopago" id="idmodopago" class="form-control">
                            <option value="">Seleccione un modo de pago</option>
                            @foreach ($idmodopagos as $modopago)
                                <option value="{{ $modopago->id }}" {{ old('idmodopago') == $modopago->id ? 'selected' : '' }}>
                                     {{ $modopago->nombre }}
                               </option>
                            @endforeach
                        </select>
                    </div>

                    
                    <label for="subtotal">Sub Total</label>
                    <input type="number" step="0.01" name="subtotal" id="subtotal" class="form-control" value="{{ old('subtotal') }}">


                    <label for="impuestos">Impuestos</label>
                    <input type="number" step="0.01" name="impuestos" id="impuestos" class="form-control" value="{{ old('impuestos') }}">

                    <label for="total">Total</label>
                    <input type="number" step="0.01" name="total" id="total" class="form-control" value="{{ old('total') }}">

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
</style>
<style>
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