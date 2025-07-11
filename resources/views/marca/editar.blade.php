@extends('adminlte::page')

@section('title', 'editar-marca')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('marca.index') }}" class="btn btn-primary rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            EDITAR MARCAS
        </h1>
    </div>
    
</div>
@stop

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card card-primary mt-4">
             <div class="card-primary">
                <div class="card-header text-center">
                    <div class="card-title w-100">
                        <h5 class="m-0">
                            <i class="fas fa-list-alt"></i> MARCAS
                        </h5>
                    </div>
                </div>
            </div>

            <div class="card-body">


                <form action="{{route('marca.update', $marca->id)}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{$marca->nombre}}" class="form-control @error('nombre') is-invalid
                        @enderror" placeholder="Nombre" value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                   <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" value="{{$marca->descripcion}}" class="form-control @error('descripcion') is-invalid
                        @enderror" placeholder="Descripcion" value="{{old('descripcion')}}">
                        @error('descripcion')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary rounded-pill px-4 mt-4">
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