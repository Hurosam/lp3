<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaisController extends Controller
{
    public function mostrar(string $pais){
        $response = Http::get('https://restcountries.com/v3.1/name/'.$pais);
        $body = $response->body();
        $body = json_decode($body, true);
        return view("pais.mostrar")->with("pais", $body);
    }
}

