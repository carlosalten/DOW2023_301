<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class EquiposController extends Controller
{
    public function index(){
        $equipos = Equipo::all();
        // return view('equipos.index',['equipos'=>$equipos]);
        return view('equipos.index',compact('equipos'));
    }
}
