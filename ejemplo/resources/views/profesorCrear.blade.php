@extends('layouts.app')

@section('content')
<div class="container">
<h1>Crear Profesor</h1>
<form class="mt-4" method="post" action="/profesor/guardar">
    @csrf
    <input class="form-control" type="text" name="dni"
    @if ($errors-> any()) value="{{old('dni')}}" @endif
    @error('dni') style='border: 1px solid red' @enderror
    placeholder="Ingrese DNI" /><br>

    <input class="form-control" type="text" name="nombres"
    @if ($errors-> any()) value="{{old('nombres')}}" @endif
    @error('nombres') style='border: 1px solid red' @enderror
    placeholder="Ingrese Nombres" /><br>

    <input class="form-control" type="text" name="apellidos"
    @if ($errors-> any()) value="{{old('apellidos')}}" @endif
    @error('apellidos') style='border: 1px solid red' @enderror
    placeholder="Ingrese Apellidos" /><br>
    

    <select name="id_programa" class='form-select'>
        <option value=""> Seleccione un Programa</option>
        @foreach($programas as $programa)
        <option value="{{$programa['id']}}">{{$programa['nombre']}}</option>
        @endforeach
    </select>

    <input class="btn btn-primary mt-4" type="submit" value="Guardar" onclick="this.disabled=true; this.form.submit();">

<form>
</div>    

@if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection