@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1>
            <img src="../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            GESTION DE MARCAS
        </h1>
    </div>
</div>
@stop

@section('content')


<div class="row">
    <div class="col-md-12">
        <a href="{{ route('marca.create') }}" data-bs-toggle='tooltip' title='Crear Marca' class="btn btn-primary mb-2"
            title="Crear Marca">
            <i class="fas fa-plus-circle"></i>
        </a>
        <div class="card card-primary mt-4">
            <div class="card-header text-center">
    <div class="card-title w-100">
        <h5 class="m-0">
            <i class="fas fa-tags mr-2"></i> MARCAS
        </h5>
    </div>
</div>
            <div class="card-body">

                <table class="table table-bordered table-striped" id="myTable">
                   <thead class="bg-primary text-white text-center">
                        <tr>
                            <td>ID</td>
                            <td>NOMBRE DE MARCA</td>
                            <td>DESCRIPCION</td>
                            <td>ACCIONES</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marcas as $marca)
                                        <tr>
                                            <td>{{$marca->id}}</td>
                                            <td>{{$marca->nombre}}</td>
                                            <td>{{$marca->descripcion}}</td>

                                            <td>
                                    <a data-bs-toggle="tooltip" title="Editar"
                                        href="{{route('marca.edit', $marca->id)}}"
                                        class="btn btn-outline-warning mt-3"><i class="fas fa-pencil-alt fa-lg"></i></a>
                                    <form action="{{route('marca.destroy', $marca->id)}}" class="d-inline"
                                        method="post">
                                        @csrf
                                         <button data-bs-toggle="tooltip" title="Eliminar" class="btn btn-outline-danger mt-3"
                                            type="submit" onclick="confirmarEliminacion(event)"><i class="fas fa-trash-alt fa-lg"></i>
                                        </button>
                                    </form>
                                </td>
                                        </tr>
                        @endforeach
            </tbody>
            <div class="card-footer">

                <a href="{{ route('index') }}" class="btn btn-secondary rounded-pill px-4 mb-3">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
            </table>
        </div>
    </div>
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
        background-color: hsla(227, 73%, 91%, 0.878);
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