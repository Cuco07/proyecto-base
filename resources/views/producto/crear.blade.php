@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
       <div class="row">
    <div class="col-12 text-center">
        <h1>
            <img src="../vendor\adminlte\dist\img/DORAPAN.png" alt="Logo" style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
            CREAR PRODUCTOS
        </h1>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <a href="{{ route('producto.index') }}" class="btn btn-secondary rounded-pill px-4 mb-3">
            <i class="fas fa-arrow-left"></i> Volver </a>
       

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
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                        
                        @error('nombre')
                     <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                    
                    @error('descripcion')
                     <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio de Venta</label>
                        <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="preciocompra" class="form-label">Precio de Compra</label>
                        <input type="number" name="preciocompra" id="preciocompra" class="form-control" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="fechacreacion" class="form-label">Fecha de Creación</label>
                        <input type="date" name="fechacreacion" id="fechacreacion" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="idmarca" class="form-label">Marca</label>
                        <select name="idmarca" id="idmarca" class="form-control" required>
                            <option value="">-- Selecciona una marca --</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="idcategoria" class="form-label">Categoría</label>
                        <select name="idcategoria" id="idcategoria" class="form-control" required>
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