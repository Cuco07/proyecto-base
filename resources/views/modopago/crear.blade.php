@extends('adminlte::page')

@section('title', 'modo-pago')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('modopago.index') }}" class="btn btn-secondary rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            CREAR MODOS DE PAGO
        </h1>
    </div>

</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-success">
            <div class="card-success">
                <div class="card-header text-center">
                    <div class="card-title w-100">
                        <h5 class="m-0">
                            <i class="fas fa-list-alt"></i> MODO DE PAGO
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('modopago.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid
                        @enderror" placeholder="Nombre" value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid
                        @enderror" placeholder="descripcion" value="{{old('descripcion')}}">
                        @error('nombre')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    

                    <div class="mb-3">
                        <label for="activo" class="form-label">Estado DE Pago</label>
                        <select name="activo" id="activo" class="form-control @error('estadopago') is-invalid
                        @enderror" placeholder="Nombre" value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    
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