@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
          <h1><img src="../../vendor/adminlte/dist/img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">

            EDITAR DE CATEGORIAS
        </h1>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('categoria.index') }}" class="btn btn-secondary rounded-pill px-4 mb-3">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
        <div class="card card-primary mt-4">
            <div class="card-warning">
                <div class="card-header text-center">
                    <div class="card-title w-100">
                        <h5 class="m-0">
                            <i class="fas fa-list-alt"></i>  CATEGORIAS
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">



            <form action="{{route('categoria.update', $categoria->id)}}" method="POST">
                @csrf

                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name='nombre' class="form-control  @error('nombre')is-invalid @enderror"
                    value="{{$categoria->nombre}}">

                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion"
                    class="form-control  @error('descripcion')is-invalid @enderror" value="{{$categoria->descripcion}}">

                @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

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
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop