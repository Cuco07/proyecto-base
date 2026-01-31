@extends('adminlte::page')

@section('title', 'editar-producto')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('producto.index') }}" class="btn btn-secondary rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            EDITAR PRODUCTOS
        </h1>
    </div>
    
</div>
@stop


@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card card-primary mt-4">
            <div class="card-secondary">
                <div class="card-header text-center">
                    <div class="card-title w-100">
                        <h5 class="m-0">
                            <i class="fas fa-box-open mr-2"></i> EDITAR PRODUCTOS
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('producto.update', $producto->id)}}" method="POST">

                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{$producto->nombre}}" class="form-control @error('nombre') is-invalid
                        @enderror" placeholder="Nombre" value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" value="{{$producto->descripcion}}" class="form-control @error('descripcion') is-invalid
                        @enderror" placeholder="Descripcion" value="{{old('descripcion')}}">
                        @error('descripcion')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" name="precio" id="precio" value="{{$producto->precio}}" class="form-control @error('precio') is-invalid
                        @enderror" placeholder="Precio" value="{{old('precio')}}">
                        @error('precio')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="preciocompra" class="form-label">Precio de Compra</label>
                       <input type="number" name="preciocompra" id="preciocompra"
                           value="{{ old('preciocompra', $producto->preciocompra) }}"
                              class="form-control">
                    </div>

                    <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name='stock' id="stock" value="{{$producto->stock}}" class="form-control  @error('stock') is-invalid
                        @enderror" placeholder="Stock" value="{{old('stock')}}">
                        @error('stock')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                    <label for="fechacreacion">Fecha De Creacion</label>
                    <input type="date" name='fechacreacion' id="fechacreacion" value="{{$producto->fechacreacion}}"
                        class="form-control @error('fechacreacion') is-invalid
                        @enderror" placeholder="fechacreacion"value="{{ old('fechacreacion', \Carbon\Carbon::parse($producto->fechacreacion)->format('Y-m-d')) }}">
                        @error('fechacreacion')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-control"> 
                        
                        <option value="1" @if ($producto->estado == 1) selected @endif>Activo</option>

                        <option value="0" @if ($producto->estado == 0) selected @endif>Inactivo</option>
                     </select>
                    </div>

                    <label for="idmarca" class="form-label">Marca</label>

                    <select name="idmarca" id="idmarca" class="form-control">
                        @foreach ($marcas as $marca)
                            <option value="{{$marca->id}}" @if ($marca->id == $producto->idmarca) selected @endif>
                                {{$marca->nombre}}
                            </option>

                        @endforeach
                    </select>

                    <label for="idcategoria" class="form-label">Categoria</label>
                    <select name="idcategoria" id="idcategoria" class="form-control">
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}" @if ($categoria->id == $producto->idcategoria) selected @endif>
                                {{$categoria->nombre}}
                            </option>
                        @endforeach
                    </select>

                    <div class="text-center">
                        <button type="submit" class="btn btn-secondary rounded-pill px-4 mt-4">
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

<div class="card-body" style="max-height: 400px; overflow-y: auto;">
    <!-- Aquí va tu contenido -->
</div>
@stop

@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop