<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
   public function register (Request $request){
    $user = new User();
    $user->email = $request->email;
    $user->password = Hash::make($request->password); //password se guardan cifrado Hash
    $user->save();//lo guardamos
    //permitir acceso a un usuario cargado
    Auth::login($user);//inicio sesion automatico
    return redirect(route('privada'));
    }
  
    public function login(Request $request){
        $credenciales = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        //mantener iniciada sesion
        $remember = ($request->has('remember')? true:false);
        if(Auth::attempt($credenciales,$remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('privada'));//si no habia ruta prevista ir a view privada
        }else{
            return redirect('login');
        }

   }
   public function logout(Request $request){
    Auth::logout();// se cerrará sesión usuario
    $request->session()->invalidate();//resetear sesion
    $request->session()->regenerateToken();

    return redirect(route('login'));//volver a login con sesion cerrada
   }
}
