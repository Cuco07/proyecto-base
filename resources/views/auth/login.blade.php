@extends('adminlte::page')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f4f6f9;">
    <div class="card shadow-lg p-4" style="width: 400px;">
        <div class="text-center mb-4">
            <img src="{{ asset('vendor/adminlte/dist/img/DORAPAN.jpeg') }}" alt="Logo" style="width: 100px; height: 100px;">
            <h3 class="mt-2 font-weight-bold">DORAPAN</h3>
            <h5 class="text-muted">Iniciar Sesión</h5>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>¡Error!</strong> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required autofocus placeholder="Correo electrónico">
            </div>

            <div class="form-group mt-3">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" required placeholder="Contraseña">
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-sign-in-alt mr-1"></i> Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
