@extends('adminlte::page')

@section('title', 'editar-cliente')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('cliente.index') }}" class="btn btn-danger rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            EDITAR CLIENTES
        </h1>
    </div>
    
</div>
@stop


@section('content')
<div class="row">
    <div class="col-md-12">
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

                <form action="{{route('cliente.update', $cliente->id)}}" method="POST">

                        @csrf
                        <label for="nombre" class="form-label">NOMBRE</label>
                        <input type="text" name="nombre" id="nombre" value="{{$cliente->nombre}}" class="form-control">

                        <label for="apellido" class="form-label">APELLIDO</label>
                        <input type="text" name="apellido" id="apellido" value="{{$cliente->apellido}}"
                            class="form-control">

                        <label for="direccion" class="form-label">DIRECCION</label>
                        <input type="text" name="direccion" id="direccion" value="{{$cliente->direccion}}"
                            class="form-control">

                        <label for="fechanacimiento" class="form-label">FECHA DE NACIMIENTO</label>
                        <input type="date" name=fechanacimiento id="fechanacimiento"
                            value="{{$cliente->fechanacimiento}}" class="form-control">

                        <label for="telefono" class="form-label">TELEFONO</label>
                        <input type="number" name="telefono" id="telefono" value="{{$cliente->telefono}}"
                            class="form-control">

                        <label for="email" class="form-label">CORREO ELECTRONICO</label>
                        <input type="tex" name="email" id="email" value="{{$cliente->email}}" class="form-control">

                        <label for="fecharegistro" class="form-label">FECHA DE REGISTRO</label>
                        <input type="date" name=fecharegistro id="fecharegistro" value="{{$cliente->fecharegistro}}"
                            class="form-control">

                        <label for="genero" class="form-label">Género</label>
                        <select class="form-control" id="genero" name="genero" required>
                            <option value="">Seleccione género</option>
                            <option value="Masculino" {{ old('genero', $cliente->genero ?? '') == 'Masculino' ? 'selected' : '' }}>
                                Masculino</option>
                            <option value="Femenino" {{ old('genero', $cliente->genero ?? '') == 'Femenino' ? 'selected' : '' }}>
                                Femenino</option>
                            <option value="Otro" {{ old('genero', $cliente->genero ?? '') == 'Otro' ? 'selected' : '' }}>
                                Otro
                            </option>
                        </select>

                       <div class="text-center">
                      <button type="submit" class="btn btn-danger rounded-pill px-4 mt-4">
                        <i class="fas fa-save"></i> Guardar
                      </button>
                   </div>
                    </form>
                </div>
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