@extends('adminlte::page')

@section('title', 'Editar Estado')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('estado.index') }}" class="btn btn-info rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../../vendor/adminlte/dist/img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            EDITAR ESTADO
        </h1>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-9 offset-1">

        <div class="card card-success mt-4">
            <div class="card-header text-center">
                <h5 class="m-0"><i class="fas fa-flag"></i> ESTADOS</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('estado.update', $estado->id) }}" method="POST">
                    @csrf
                    <!-- NO usar @method('PUT') porque tu ruta es POST -->

                    <!-- DESCRIPCION -->
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion"
                            class="form-control @error('descripcion') is-invalid @enderror"
                            value="{{ $estado->descripcion }}">
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ACTIVO -->
                    <div class="form-group">
                        <label>Estado</label><br>
                        <input type="checkbox" name="activo" value="1"
                            {{ $estado->activo ? 'checked' : '' }}>
                        Activo
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-info rounded-pill px-4 mt-4">
                            <i class="fas fa-save"></i> Actualizar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@stop

