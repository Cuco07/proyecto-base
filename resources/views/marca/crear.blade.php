@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
         <div class="row">
    <div class="col-12 text-center">
        <h1>
            <img src="../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo" style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            CREAR MARCAS
        </h1>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9 offset-1">

            <a href="{{ route('marca.index') }}" class="btn btn-secondary rounded-pill px-4 mb-3">
            <i class="fas fa-arrow-left"></i> Volver </a>

            <div class="card card-success mt-4">
                <div class="card-header">
                    <h1 class="card-title">Marca</h1>
                </div>
           <div class="card-body">


            <form action="{{route('marca.store')}}" method="POST">
                @csrf

                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name='nombre' class="form-control  @error('nombre')is-invalid @enderror" placeholder="Nombre"> 

                @error('nombre')
                     <div class="invalid-feedback">{{ $message }}</div>
                 @enderror


                <label for="descripcion" class="form-label" >Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control  @error('descripcion')is-invalid @enderror" placeholder="Descripción" >

                @error('descripcion')
                     <div class="invalid-feedback">{{ $message }}</div>
                 @enderror

                <div class="text-center">
                    <button type="submit" class="btn btn-success rounded-pill px-4 mt-4">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
             </div>

            </form>
         </div>
            
        </div>


    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
