@extends('adminlte::page')

@section('title', 'DORAPAN')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
       <div class="col-12 text-center">
        <h1>
            <img src="vendor/adminlte/dist/img/DORAPAN.png" alt="Logo" style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
             DORAPAN
        </h1>
    </div>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <a href="{{ route('marca.index') }}" class="card custom-card bg-primary text-white text-center text-decoration-none">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-tags fa-3x mb-2"></i>
                <h5 class="m-0">Marcas</h5>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
        <a href="{{ route('categoria.index') }}" class="card custom-card bg-warning text-dark text-center text-decoration-none">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-th-list fa-3x mb-2"></i>
                <h5 class="m-0">Categorías</h5>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
        <a href="{{ route('producto.index') }}" class="card custom-card bg-secondary text-white text-center text-decoration-none">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-box-open fa-3x mb-2"></i>
                <h5 class="m-0">Productos</h5>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
        <a href="{{ route('modopago.index') }}" class="card custom-card bg-success text-white text-center text-decoration-none">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-credit-card fa-3x mb-2"></i>
                <h5 class="m-0">Modos de Pago</h5>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <a href="{{ route('estado.index') }}" class="card custom-card bg-info text-white text-center text-decoration-none">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-flag fa-3x mb-2"></i>
                <h5 class="m-0">Estados</h5>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
        <a href="{{ route('cliente.index') }}" class="card custom-card bg-danger text-white text-center text-decoration-none">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-users fa-3x mb-2"></i>
                <h5 class="m-0">Clientes</h5>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
    <div class="card custom-card card-indigo">
        <div class="card-body d-flex felx-column align-items-center justify-content-center">
            <a href="{{ route('factura.index') }}" class="stretched-link text-white text-decoration-none">
                <i class="fas fa-file-alt fa-2x"></i>
                <h5 class="m-0">Factura</h5>
            </a>
        </div>
    </div>
</div>

    <div class="col-md-3 mb-4">
        <a href="{{ route('detallefactura.index') }}" class="card custom-card bg-dark text-white text-center text-decoration-none">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-file-invoice-dollar fa-3x mb-2"></i>
                <h5 class="m-0">Detalle Factura</h5>
            </div>
        </a>
    </div>
</div>


@stop

@section('css')
<style>
    .sidebar .nav-link {
        text-align: left !important;
    }

    .custom-card {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .custom-card:hover {
        background-color: rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
    }

    .custom-card .card-body {
        padding: 1rem;
    }

    .custom-card h5 {
        font-weight: bold;
        margin-top: 10px;
    }

    .custom-card:hover i,
    .custom-card:hover h5 {
        color: #fff !important;
    }

    .card-indigo {
    background-color: #9f71e8;
    color: white;
}
.card-indigo:hover {
    background-color: #9f71e8;
}

.card-teal {
    background-color: #20c997;
    color: white;
}
.card-teal:hover {
    background-color: #1aa179;
}
</style>
<style>
    .custom-card {
        border-radius: 1rem;
        transition: transform 0.3s ease, filter 0.3s ease, box-shadow 0.3s ease;
        min-height: 160px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border: 2px solid transparent;
    }

    .custom-card:hover {
        transform: translateY(-5px) scale(1.03);
        filter: brightness(90%);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        border-color: rgba(255,255,255,0.3);
    }

    .custom-card i {
        font-size: 3.2rem;
        animation: bounce 1.5s infinite ease-in-out;
    }

    .custom-card h5 {
        margin-top: 10px;
        font-weight: bold;
    }

    /* Animación ícono */
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }
</style>
@stop

@section('js')
<script> console.log("Vista principal de DORAPAN cargada."); </script>
@stop
