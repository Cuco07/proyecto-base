@extends('adminlte::page')

@section('title', 'PROYECTO BASE')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1>
            <img src="../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            CREAR CLIENTES
        </h1>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-9 offset-1">

        <a href="{{ route('cliente.index') }}" data-bs-toggle='tooltip' title='Volver'
            class="btn btn-danger rounded-pill px-4" title=" Volver">
            <i class="fas fa-arrow-left"> Volver</i>
        </a>

        <div class="card card-success mt-4">
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


                <form action="{{route('cliente.store')}}" method="POST">
                    @csrf
                    
                    <label for="nombre" class="form-label">NOMBRE</label>
                    <input type="text" name="nombre" id="nombre"
                        class="form-control  @error('nombre')is-invalid @enderror" placeholder="Nombre">

                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    

                    <label for="apellido" class="form-label">APELLIDO</label>
                    <input type="text" name="apellido" id="apellido"
                        class="form-control  @error('apellido')is-invalid @enderror" placeholder="Apellido">

                    @error('apellido')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="direccion" class="form-label">DIRECCION</label>
                    <input type="text" name="direccion" id="direccion"
                        class="form-control  @error('direccion')is-invalid @enderror" placeholder="Direccion">

                    @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="fechanacimiento" class="form-label">FECHA DE NACIMIENTO</label>
                    <input type="date" name="fechanacimiento" id="fechanacimiento"
                        class="form-control  @error('fechanacimiento')is-invalid @enderror"
                        placeholder="Fecha Nacimiento">

                    @error('fechanacimiento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="telefono" class="form-label">TELEFONO</label>
                    <input type="tex" name="telefono" id="telefono"
                        class="form-control  @error('telefono')is-invalid @enderror" placeholder="Telefono">

                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="email" class="form-label">Correo Electronico</label>
                    <input type="text" name="email" id="amail" class="form-control  @error('email')is-invalid @enderror"
                        placeholder="Email">

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="fecharegistro" class="form-label">FECHA DE REGISTRO</label>
                    <input type="date" name="fecharegistro" id="fecharegistro"
                        class="form-control  @error('fecharegistro')is-invalid @enderror" placeholder="Fecha Registro">

                    @error('fecharegistro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="genero" class="form-label">Género</label>
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="">Seleccione género</option>
                        <option value="Masculino" {{ old('genero', $cliente->genero ?? '') == 'Masculino' ? 'selected' : '' }}>
                            Masculino</option>
                        <option value="Femenino" {{ old('genero', $cliente->genero ?? '') == 'Femenino' ? 'selected' : '' }}>
                            Femenino</option>
                        <option value="Otro" {{ old('genero', $cliente->genero ?? '') == 'Otro' ? 'selected' : '' }}>Otro
                        </option>
                    </select>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger rounded-pill px-4 mt-4">
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