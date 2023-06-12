<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RolesRequest;

class RolesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::orderBy('nombre')->get();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('roles.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolesRequest $request)
    {
        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->save();
        return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        return redirect()->route('roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        return redirect()->route('roles.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        if(Auth::user()->rol->id!=$rol->id){
            $rol->delete();
        }
        return redirect()->route('roles.index');

    }
}
