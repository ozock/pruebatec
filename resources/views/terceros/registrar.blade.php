@extends('layouts/app')
@section('items')
    <a class="nav-link active" aria-current="page" href="#">Crear tercero</a>
    <a class="nav-link" aria-current="page" href="{{ route('mostrarTerceros') }}">Gestionar tercero</a>
@endsection
@section('titulo')
    Registrar tercero
@endsection
@section('content')
    <form action="{{route('registrarDatos')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="tipodoc" class="form-label">Tipo Documento</label>
                <select id="tipodoc" name="tipodoc" class="form-select" required>
                    <option value="" selected>Seleccionar...</option>
                    <option value="cc">Cédula</option>
                    <option value="nit">NIT</option>
                    <option value="ext">Cédula Extranjería</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="numdoc" class="form-label">Número identificación</label>
                <input class="form-control" type="number" id="numdoc" name="numdoc">
            </div>

            <div class="col-md-4 mb-3">
                <label for="tipotercero" class="form-label">Tipo Tercero</label>
                <select id="tipotercero" name="tipotercero" class="form-select" required>
                    <option selected>Seleccionar...</option>

                    @php
                        foreach( $tipo as $t  ){

                            $valor = $t['id'];
                            $nombre = $t['nombtipo'];

                            echo "<option value='$valor'>$nombre</option>";
                        }
                    @endphp
                    
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="nombre1" class="form-label">Primer Nombre</label>
                <input class="form-control" type="text" name="nombre1" id="nombre1" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="nombre2" class="form-label">Segundo Nombre</label>
                <input class="form-control" type="text" name="nombre2" id="nombre2">
            </div>

            <div class="col-md-4 mb-3">
                <label for="apellido1" class="form-label">Primer Apellido</label>
                <input class="form-control" type="text" name="apellido1" id="apellido1" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="apellido2" class="form-label">Segundo Apellido</label>
                <input class="form-control" type="text" name="apellido2" id="apellido2">
            </div>

            <div class="col-md-4 mb-3">
                <label for="dpto" class="form-label">Departamento</label>
                <select id="dpto" name="dpto" class="form-select" required>
                    <option selected>Seleccionar...</option>
                    @php
                    foreach( $depto as $t  ){

                        $valor = $t['id'];
                        $nombre = $t['nomdepa'];

                        echo "<option value='$valor'>$nombre</option>";
                    }
                @endphp
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="munc" class="form-label">Municipio</label>
                <select id="munc" name="munc" class="form-select" required>
                    <option selected>Seleccionar...</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>


@if (session('status'))
<br>
<div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
    </div>
@endif


@endsection
