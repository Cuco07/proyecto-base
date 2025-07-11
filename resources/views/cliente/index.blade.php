@extends('adminlte::page')

@section('title', 'PROTECTO BASE')

@section('content_header')
<div class="row">
    <div class="col-12  text-center">

        <h1><img src="../../vendor/adminlte/dist/img/DORAPAN.png" alt="Logo"
                style="height: 100px; vertical-align: middle; margin-right: 10px; width: 100px;">

            GESTION DE CLIENTES
        </h1>
    </div>
</div>
@stop

@section('content')

<div class="row">
    <div class="col-md-12 offset">

        <div class="card card-primary mt-4">

            <div class="card-danger">
                <div class="card-header text-center">
                    <div class="card-title w-100">
                        <h5 class="m-0">
                            <i class="fas fa-users"></i> CIENTES
                        </h5>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead class="table-danger text-center">
                        <tr>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>APELLIDO</td>
                            <td>DIRECCION</td>
                            <td>FECHA DE NACIMIENTO</td>
                            <td>TELEFONO</td>
                            <td>EMAIL</td>
                            <td>FECHA DE REGISTRO</td>
                            <td>GENERO</td>
                            <td style="min-width: 5rem">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->apellido}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>{{$cliente->fechanacimiento}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->fecharegistro}}</td>
                                <td>{{$cliente->genero}}</td>
                                <td>
                                    <a data-bs-toggle="tooltip" title="Editar"
                                        href="{{route('cliente.edit', $cliente->id)}}"
                                        class="btn btn-outline-warning mt-3"><i class="fas fa-pencil-alt fa-lg"></i></a>
                                    <form action="{{route('cliente.destroy', $cliente->id)}}" class="d-inline"
                                        method="post">
                                        @csrf
                                        <button data-bs-toggle="tooltip" title="Eliminar"
                                            class="btn btn-outline-danger mt-3" type="submit"
                                            onclick="confirmarEliminacion(event)"><i class="fas fa-trash-alt fa-lg"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <div class="card-footer">
                        <div class="col-md-4 mt-3 ">
                            <a href="{{ route('cliente.create') }}" data-bs-toggle='tooltip' title='Crear cliente'
                                class="btn btn-danger mb-2" title="Crear Clientes">
                                <i class="fas fa-plus-circle"> Crear Cliente</i>
                            </a>

                        </div>
                    </div>
                </table>
                <a href="{{ route('index') }}" data-bs-toggle='tooltip' title='Volver'
                    class="btn btn-danger rounded-pill px-4" title=" Volver">
                    <i class="fas fa-arrow-left"> Volver</i>
                </a>
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
    .sidebar .nav-link {
        text-align: left !important;
    }
</style>

<style>
    /* Mantener el color original de los botones en el menú al estar activos o al hacer clic */

    .nav-sidebar .nav-link.btn.active,
    .nav-sidebar .nav-link.btn:focus,
    .nav-sidebar .nav-link.btn:active {
        box-shadow: none !important;
    }

    .nav-sidebar .nav-link.btn.btn-primary.active,
    .nav-sidebar .nav-link.btn.btn-primary:focus,
    .nav-sidebar .nav-link.btn.btn-primary:active {
        background-color: #007bff !important;
        color: #fff !important;
        border-color: #007bff !important;
    }

    .nav-sidebar .nav-link.btn.btn-secondary.active,
    .nav-sidebar .nav-link.btn.btn-secondary:focus,
    .nav-sidebar .nav-link.btn.btn-secondary:active {
        background-color: #6c757d !important;
        color: #fff !important;
        border-color: #6c757d !important;
    }

    .nav-sidebar .nav-link.btn.btn-warning.active,
    .nav-sidebar .nav-link.btn.btn-warning:focus,
    .nav-sidebar .nav-link.btn.btn-warning:active {
        background-color: #ffc107 !important;
        color: #212529 !important;
        border-color: #ffc107 !important;
    }

    .nav-sidebar .nav-link.btn.btn-success.active,
    .nav-sidebar .nav-link.btn.btn-success:focus,
    .nav-sidebar .nav-link.btn.btn-success:active {
        background-color: #28a745 !important;
        color: #fff !important;
        border-color: #28a745 !important;
    }

    .nav-sidebar .nav-link.btn.btn-info.active,
    .nav-sidebar .nav-link.btn.btn-info:focus,
    .nav-sidebar .nav-link.btn.btn-info:active {
        background-color: #17a2b8 !important;
        color: #fff !important;
        border-color: #17a2b8 !important;
    }

    .nav-sidebar .nav-link.btn.btn-danger.active,
    .nav-sidebar .nav-link.btn.btn-danger:focus,
    .nav-sidebar .nav-link.btn.btn-danger:active {
        background-color: #dc3545 !important;
        color: #fff !important;
        border-color: #dc3545 !important;
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