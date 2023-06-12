<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['login']);
    }

    public function index(){
        // return "Hola Mundo Laravel";
        return view('home.index');
    }

    public function login(){
        return view('home.login');
    }
}
