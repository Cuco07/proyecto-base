@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('producto.index') }}" class="btn btn-secondary rounded-pill px-4 mb-3 mt-4 ml-5">
            <i class="fas fa-arrow-left"></i> Volver </a>
    </div>
    <div class="col-md-8">
        <h1 class="ml-5">
            <img src="../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo"
                style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            PRODUCTOS
        </h1>
    </div>

</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-success">
            <div class="card-secondary">
                <div class="card-header text-center">
                    <div class="card-title w-100">
                        <h5 class="m-0">
                            <i class="fas fa-list-alt"></i> CREAR PRODUCTO
                        </h5>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('producto.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid
                        @enderror" placeholder="Nombre" value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Desacripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid
                        @enderror" placeholder="Descripcion" value="{{old('descripcion')}}">
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                   <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" name="prcio" id="precio" class="form-control @error('precio') is-invalid
                        @enderror" placeholder="Precio" value="{{old('precio')}}">
                        @error('precio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="preciocompra" class="form-label">Precio  Compra</label>
                        <input type="number" name="preciocompra" id="preciocompra" class="form-control @error('preciocompra') is-invalid
                        @enderror" placeholder="Precio compra" value="{{old('preciocompra')}}">
                        @error('preciocompra')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock  Compra</label>
                        <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid
                        @enderror" placeholder=" stock" value="{{old('stock')}}">
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fechacreacion" class="form-label">Fecha de Creación</label>
                        <input type="date" name="fechacreacion" id="fechacreacion" class="form-control @error('fechacreacion') is-invalid
                        @enderror" placeholder=" fechacreacion" value="{{old('fechacreacion')}}">
                        @error('fechacreacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-control @error('estado') is-invalid
                        @enderror" placeholder=" estado" value="{{old('estado')}}">
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="idmarca" class="form-label">Marca</label>
                        <select name="idmarca" id="idmarca" class="form-control @error('idmarca') is-invalid
                        @enderror" placeholder=" idmarca" value="{{old('idmarca')}}">
                            <option value="">-- Selecciona una marca --</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                            @error('idmarca')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="idcategoria" class="form-label">Categoría</label>
                        <select name="idcategoria" id="idcategoria" class="form-control @error('idcategoria') is-invalid
                        @enderror" placeholder=" idcategoria" value="{{old('idcategoria')}}">
                        @error('idcategoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
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

<div class="card-body" style="max-height: 400px; overflow-y: auto;">
    <!-- Aquí va tu contenido -->
</div>
@stop