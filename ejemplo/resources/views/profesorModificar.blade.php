@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modificar Profesor</h1>
    <form class="mt-4" method="post" action="/profesor/actualizar/{{$profesor['id']}}">
        @csrf
        <input class="form-control" type="text" name="dni" value="{{$profesor['dni']}}"
               placeholder="Ingrese DNI" /><br>

        <input class="form-control" type="text" name="nombres" value="{{$profesor['nombres']}}"
               placeholder="Ingrese Nombres" /><br>

        <input class="form-control" type="text" name="apellidos" value="{{$profesor['apellidos']}}"
               placeholder="Ingrese Apellidos" /><br>
        
        <select name="id_programa" class='form-select'>
            @foreach($programas as $programa)
            <option value="{{$programa['id']}}" 
                    @if($programa['id']==$profesor['id_programa']) selected @endif>
                {{$programa['nombre']}}
            </option>
            @endforeach
        </select>

        <input class="btn btn-primary mt-4" type="submit" value="Actualizar" /><br>
    </form>
</div>
@endsection
