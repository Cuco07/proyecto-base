@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('modopago.index') }}" class="btn btn-success rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            EDITAR MODOS DE PAGO
        </h1>
    </div>
    
</div>
@stop

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card card-primary mt-4">
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

                <div class="card card-success mt-4">

                    <form action="{{route('modopago.update', $modopago->id)}}" method="POST">
                        @csrf

                        <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{$modopago->nombre}}" class="form-control @error('nombre') is-invalid
                        @enderror" placeholder="Nombre" value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                     <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" value="{{$modopago->descripcion}}" class="form-control @error('descripcion') 
                            is-invalid
                        @enderror">

                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                         </div>


                     
                   


                        <label for="activo" class="form-control">Estado de Pago </label>
                        <select name="activo" id="activo" class="form-control" required>
                            <option value="1" {{ $modopago->activo == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ $modopago->activo == 0 ? 'selected' : '' }}>Inactivo</option>
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