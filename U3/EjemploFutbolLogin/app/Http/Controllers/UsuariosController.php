<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsuariosRequest;
use App\Http\Requests\CambiarContrasenaRequest;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['autenticar','logout']);
    }

    /**
     * Autenticar usuario
     */
    public function autenticar(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            Auth::user()->registraUltimoLogin();
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'email' => 'Credenciales Incorrectas',
        ])->onlyInput('email');
    }

    /**
     * Cerrar sesión
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('home.login');
    }

    /**
     * Cambiar estado usuario
     */
    public function cambiarEstado(Usuario $usuario){
        if($usuario!=Auth::user()){
            $usuario->cambiarEstado();
        }
        return redirect()->route('usuarios.index');
    }

     /**
     * Cambiar contraseña
     */
    public function cambiarContrasena(){
        return view('usuarios.contrasena');
    }

    public function aplicarCambiarContrasena(CambiarContrasenaRequest $request){
        $usuario = Auth::user();
        $usuario->password = Hash::make($request->password1);
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::orderBy('nombre')->get();
        $usuarios = Usuario::orderBy('nombre')->get();
        return view('usuarios.index',compact(['usuarios','roles']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('usuarios.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuariosRequest $request)
    {
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->rol_id = $request->rol;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return redirect()->route('usuarios.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return redirect()->route('usuarios.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        if($usuario!=Auth::user()){
            $usuario->delete();
        }
        
        return redirect()->route('usuarios.index');
    }
}
