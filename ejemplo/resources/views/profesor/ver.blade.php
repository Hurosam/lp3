@extends('layouts.app')

@section('content')
<div class="container">

<h1>Lista de Profesores</h1>
<table class="table table-striped mt-4">
    <tr>
        <th>DNI</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Programa Académico</th>
        <th>Acciones</th>
        <th>&nbsp;</th>
    </tr>
    @foreach($profesores as $profesor)
    <tr>
        <td>{{ $profesor["dni"] }}</td>
        <td>{{ $profesor["nombres"] }}</td>
        <td>{{ $profesor["apellidos"] }}</td>
        <td>{{ $profesor["programa"] }}</td>
        <td><a class="btn btn-sm btn-primary" href="/profesor/modificar/{{$profesor['id']}}">Modificar</a></td>
        <td><a class="btn btn-sm btn-danger" href="/profesor/eliminar/{{$profesor['id']}}">Eliminar</a></td>
    </tr>
    @endforeach
</table>
</div>
@endsection
