<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;

class JugadoresController extends Controller
{
    public function index(){
        $jugadores = Jugador::orderBy('apellido')->orderBy('nombre')->get();
        return view('jugadores.index',compact('jugadores'));//carpeta jugadores, archivo index.blade.php
    }
}
