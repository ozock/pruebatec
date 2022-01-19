@extends('layouts/app')
@section('items')
    <a class="nav-link" aria-current="page" href="{{ route('registrar') }}">Crear tercero</a>
    <a class="nav-link active" aria-current="page" href="#">Gestionar tercero</a>
@endsection
@section('titulo')
    Gestionar tercero
@endsection
@section('content')



    <div class="card">
        <div class="card-body">
            <table class=" table ">
                <thead>
                    <tr class="table-primary">

                        <th scope="col">Departamento</th>
                        <th scope="col">Municipio</th>
                        <th scope="col" colspan="2">Identificación</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Tipo Tercero</th>
                        <th scope="col" colspan="2">Acciones</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($consulta as $c)
                        <tr>

                            <td>{{ $c->nomdepa }}</td>
                            <td>{{ $c->nombmuni }}</td>
                            <td>{{ $c->tipoidentificacion }}</td>
                            <td>{{ $c->numeroidentificacion }}</td>
                            <td>{{ $c->nombre1 . ' ' . $c->apellido1 }}</td>
                            <td>{{ $c->nombtipo }}</td>
                            <td> <button type="button" class="btn btn-success" onclick="abrirModal('{{ $c->id }}')">
                                    <i class="fas fa-user-edit"></i></button></td>
                            <td> <button type="button" class="btn btn-danger" onclick="eliminarTercero('{{ $c->id }}')"> <i class="fas fa-trash"></i> </button></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>


    <!-- Modal -->
    <div class="modal fade" id="verTercero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="cuerpo_modal">

                    <form action="{{ route('actualizarDatos') }}" method="POST">
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
                                <input class="form-control" type="hidden" id="idt" name="idt">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tipotercero" class="form-label">Tipo Tercero</label>
                                <select id="tipotercero" name="tipotercero" class="form-select" required>
                                    <option selected value="" >Seleccionar...</option>

                                    @php
                                        foreach ($tipo as $t) {
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
                                    <option selected value="" >Seleccionar...</option>
                                    @php
                                        foreach ($depto as $t) {
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
                                    <option selected value="">Seleccionar...</option>
                                </select>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @if (session('status'))
    <br>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
        </div>
    @endif

@endsection
