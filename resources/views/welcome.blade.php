@extends('adminlte::master')

@section('adminlte_css')
<style>
    body {
        background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
        width: 100%;
        max-width: 400px;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        margin: 60px auto;
        transition: transform 0.3s ease;
    }

    .login-container:hover {
        transform: translateY(-5px);
    }

    .login-logo img {
        width: 120px;
        height: auto;
        margin-bottom: 20px;
    }

    h3 {
        font-weight: 600;
        color: #333;
        margin-bottom: 25px;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px;
        font-size: 15px;
    }

    .btn-primary {
        background: #4a90e2;
        border: none;
        border-radius: 8px;
        padding: 12px;
        font-size: 16px;
        font-weight: 600;
        transition: background 0.3s ease;
    }

    .btn-primary:hover {
        background: #357ABD;
    }

    .password-wrapper {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
    }

    .alert-danger {
        border-radius: 8px;
    }
</style>
@stop

@section('body')
<div class="login-container text-center">

    <!-- LOGO -->
    <div class="login-logo">
        <img src="{{ asset('vendor/adminlte/dist/img/DORAPAN.png') }}" alt="logo">
    </div>

    <h3>Bienvenidos a <span style="color:#4a90e2;">DORAPAN</span></h3>

    <!-- FORMULARIO LOGIN -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group mt-3">
            <input type="email" name="email" class="form-control" placeholder="Correo" required autofocus>
        </div>

        <div class="form-group mt-3 password-wrapper">
            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
            <span class="toggle-password" onclick="togglePassword()">
                <i class="fas fa-eye"></i>
            </span>
        </div>

        <button class="btn btn-primary btn-block mt-3">
            Ingresar
        </button>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                {{ $errors->first() }}
            </div>
        @endif

    </form>

</div>
@stop

@section('adminlte_js')
<script>
    console.log("Pantalla de login personalizada cargada");

    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const toggleIcon = document.querySelector(".toggle-password i");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }
</script>
@stop
