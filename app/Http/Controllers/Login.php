<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Login extends Controller
{
    public function index(){
        if (auth()->check()) {
            return redirect()->route('home.index');
        }else{
            return view('auth.login');
        }
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home.index');
        }else{
            return back()->with('error','Verifica que el correo o la contraeña esten bien escritas');
        }
    }

    public function registro(){
        return view('auth.registro');
    }

    public function registro_add(Request $request){
        $existe_user = User::where('email',$request->email)->get();
        if ($existe_user->isEmpty()) {
            if ($request->password === $request->confirm) {
                try {
                    DB::beginTransaction();
                    $user = new User;
                    $user->usuario = $request->usuario;
                    $user->nombre = $request->nombre;
                    $user->apellido = $request->apellido;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->save();
                    DB::commit();
                    
                    $credentials = $request->validate([
                        'email' => ['required', 'email'],
                        'password' => ['required'],
                    ]);
                    
                    if (Auth::attempt($credentials)) {
                        $request->session()->regenerate();
                        
                        return redirect()->route('home.index');
                    }
                } catch (Exception $e) {
                    DB::rollBack();
                    return back()->with('error', 'Ha ocurrido un error, por favor intenta mas tarde');
                    Log::info($e);
                    // mensaje ha ocurrido un error, favor de intentar mas tarde
                }
            }else{
                return back()->with('error','Las contraseñas deben conincidir');
                // mensaje las contraseñas deben conincidir
            }
        }else{
            return back()->with('error','Ya existe un usuario registrado con ese correo electrónico');
            // mensaje ya existe un usuario con ese correo registrado
        }
    }

    public function olvido_password(){
        return view('auth.olvido');
    }

    public function reset_password(Request $request){
        $existe_user = User::where('email',$request->email)->first();
        if ($existe_user) {
            return view('auth.reset')->with('email',$request->email);
        }
        return back()->with('error','No existe el correo');
    }

    public function cambiar_password(Request $request){
        $existe_user = User::where('email',$request->email)->first();
        if ($request->password === $request->confirm) {
            try {
                DB::beginTransaction();
                $existe_user->password = Hash::make($request->password);
                $existe_user->save();
                DB::commit();
                
                $credentials = $request->validate([
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                ]);
                
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    
                    return redirect()->route('home.index');
                }
            } catch (Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Ha ocurrido un error, por favor intenta mas tarde');
                Log::info($e);
                // mensaje ha ocurrido un error, favor de intentar mas tarde
            }
        }else{
            return back()->with('error','Las contraseñas deben conincidir');
            // mensaje las contraseñas deben conincidir
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('inicio');
    }

    public function editar(){
        return view('auth.editar');
    }

    public function update(Request $request){
        $existe_user = User::where('email',auth()->user()->email)->first();
        if ($request->password === $request->confirm) {
            try {
                DB::beginTransaction();
                $existe_user->password = Hash::make($request->password);
                $existe_user->save();
                DB::commit();
                return back()->with('success','Se ha cambiado el password con exito');
            } catch (Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Ha ocurrido un error, por favor intenta mas tarde');
                Log::info($e);
                // mensaje ha ocurrido un error, favor de intentar mas tarde
            }
        }else{
            return back()->with('error','Las contraseñas deben conincidir');
            // mensaje las contraseñas deben conincidir
        }
    }
}
