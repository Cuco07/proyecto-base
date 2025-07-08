@extends('adminlte::page')

@section('title', 'Proyecto Base')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
       <div class="col-12 text-center">
            <h1>
             <img src="vendor/adminlte/dist/img/DORAPAN.png" alt="Logo" style="height: 90px; vertical-align: middle; margin-right: 10px; width: 90px;">
             BIENVENIDOS A DORAPAN
            </h1>
        </div>
    </div>
 </div>

    
@stop

@section('content')

<div class="row">
    <div class="col-12 text-center">
       <div class="col-12 text-center">
          <a class="btn btn-outline-success mt-4" href="{{route('index')}}">Ingresar</a>
        </div>
    </div>
 </div>
   
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
