@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1>
            <img src="../../vendor/adminlte/dist/img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            EDITAR ESTADO
        </h1>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-9 offeset-1">

        <a href="{{ route('estado.index') }}" class="btn btn-secondary rounded-pill px-4 mb-3">
            <i class="fas fa-arrow-left"></i> Volver </a>

        <div class="card card-primary mt-4">
                
            <div class="card-info">
                   <div class="card-header text-center">
                       <div class="card-title w-100">
                        <h5 class="m-0">
                            <i class="fas fa-flag"></i> EDITAR ESTADOS
                        </h5>
                       </div>
                     </div>
           </div>

            <form action="{{route('estado.update', $estados->id)}}" method="POST">

                @csrf
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" value="{{$estados->descripcion}}"
                    class="form-control">



                <div class="text-center">
                    <button type="submit" class="btn btn-success rounded-pill px-4 mt-4">
                        <i class="fas fa-save"></i> Guardar
                    </button>
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