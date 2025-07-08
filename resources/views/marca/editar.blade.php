@extends('adminlte::page')

@section('title', 'editar-marca')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1>
            <img src="../../vendor/adminlte/dist/img/DORAPAN.png"  alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            EDITAR MARCAS
        </h1>
    </div>
</div>
@stop

@section('content')
<div class="row">

    <div class="col-md-12">

        <a href="{{ route('marca.index') }}" class="btn btn-secondary rounded-pill px-4 mb-3">
            <i class="fas fa-arrow-left"></i> Volver
        </a>

        <div class="card card-primary mt-4">
            <div class="card-header">
                <div class="card-title">
                    <h5>MARCAS</h5>
                </div>
            </div>

            <div class="card-body">


                <form action="{{route('marca.update', $marca->id)}}" method="POST">
                    @csrf

                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name='nombre' value="{{$marca->nombre}}" class="form-control @error('nombre') 
                        is-invalid
                    @enderror">

                    @error('nombre')


                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" name="descripcion" value="{{$marca->descripcion}}" class="form-control @error('nombre') 
                        is-invalid
                     @enderror">

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
@stop

@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop