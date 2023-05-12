<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Equipo;

class JugadoresController extends Controller
{
    public function index(){
        $jugadores = Jugador::orderBy('apellido')->orderBy('nombre')->get();
        return view('jugadores.index',compact('jugadores'));//carpeta jugadores, archivo index.blade.php
    }

    public function create(){
        // $equipo = Equipo::all();
        $equipos = Equipo::orderBy('nombre')->get();
        return view('jugadores.create',compact('equipos'));
    }

    public function store(Request $request){
        $jugador = new Jugador();
        $jugador->rut = $request->rut;
        $jugador->nombre = $request->nombre;
        $jugador->apellido = $request->apellido;
        $jugador->numero_camiseta = $request->numero_camiseta;
        $jugador->posicion = $request->posicion;
        $jugador->equipo_id = $request->equipo;
        $jugador->save();
        return redirect()->route('jugadores.index');
    }

    public function edit(Jugador $jugador){
        $equipos = Equipo::orderBy('nombre')->get();
        
        // return view('jugadores.edit',compact('jugador'));
        return view('jugadores.edit',compact(['jugador','equipos']));
    }

    public function update(Request $request,Jugador $jugador){
        $jugador->rut = $request->rut;
        $jugador->nombre = $request->nombre;
        $jugador->apellido = $request->apellido;
        $jugador->numero_camiseta = $request->numero_camiseta;
        $jugador->posicion = $request->posicion;
        $jugador->equipo_id = $request->equipo;

        $jugador->save();

        return redirect()->route('jugadores.index');
    }

    public function destroy(Jugador $jugador){
        $jugador->delete();
        return redirect()->route('jugadores.index');
    }
}
