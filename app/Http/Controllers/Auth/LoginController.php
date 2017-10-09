<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// aqui se define nos del nucleo
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Artisan;
use Session;
class LoginController extends Controller
{
	// para hacer las validaciones de login 
	// es necesario que todos los metodos que se desean modificar en este archivo sean copios y pegados en este para no generar problemas con el nucleo del framework
    use AuthenticatesUsers;
    // aqui se define a que ruta se redirique el usuario al iniciar

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    // aqui van los metodos para mas prioridad

    public function logout(Request $request) {
        
        Auth::logout();
        Cache::flush();
        Session::flush();
        // Artisan::call('cache:clear');
        // Artisan::call('view:clear');
        return redirect('/login');

    }


}
