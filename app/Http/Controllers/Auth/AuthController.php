<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function register(){
        return view('auth.register');
    }
    public function registerVerify(Request $request){
        $request->validate([
            'email' => 'required|unique:users,email', // requerido y debe ser unico
            'password' => 'required', //minimo de 4 valores
            'password_confirmation' => 'required|same:password',// igual^
        ]);

        User::create([
            
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login')->with("mensaje","Usuario registrado correctamente");

    }
    public function login(){
        return view('auth.login');
    }
    public function loginVerify(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['invalid_credentials' => 'Usuario o contraseña no valida'])->withInput();
    }
    public function cerrarSesion(){
        Auth::logout();
        return redirect()->route('login')->with('success','La sesión se ha cerrado correctamente');
    }
}
