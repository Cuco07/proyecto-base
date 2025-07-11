@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('estado.index') }}" class="btn btn-info rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            EDITAR ESTADOS
        </h1>
    </div>
    
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-9 offset-1">

       

        <div class="card card-success mt-4">
           
            <div class="card-info">
                   <div class="card-header text-center">
                       <div class="card-title w-100">
                        <h5 class="m-0">
                            <i class="fas fa-flag"></i> ESTADOS
                        </h5>
                       </div>
                     </div>
           </div>
            <div class="card-body">


                <form action="{{route('estado.store')}}" method="POST">
                    @csrf

                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion"
                        class="form-control  @error('descripcion')is-invalid @enderror" placeholder="Descripción">

                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror


                    <div class="text-center">
                        <button type="submit" class="btn btn-info rounded-pill px-4 mt-4">
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
<style>
    .sidebar .nav-link {
        text-align: left !important;
    }
</style>
@stop

@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop