<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquiposController extends Controller
{
    public function index(){
        return view('equipos.index');
    }
}
