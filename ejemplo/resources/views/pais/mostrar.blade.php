<b>Pais:</b> {{$pais[0]['name']['official']}}<br>
<b>Capital:</b> {{$pais[0]['capital']['0']}}<br>
<b>Subregion:</b> {{$pais[0]['subregion']['0']}}<br>

@if(isset($pais[0]['borders']))
    <b>Fronteras:</b>
    <ol>
        @foreach ($pais[0]['borders'] as $frontera)
            <li>{{$frontera}}</li>
        @endforeach
    </ol>
@endif

<b>Bandera: </b><br>
<img src ="{{$pais[0]['flags']['svg']}}" width="200px"/><br>
<b>Escudo: </b><br>
<img src ="{{$pais[0]['coatOfArms']['svg']}}" width="200px"/><br>
<a href="{{$pais[0]['maps']['googleMaps']}}" target ="_blank">Ver Mapa</a>
