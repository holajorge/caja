<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
        // es necesario que todos los metodos que se desean modificar en este archivo sean copios y pegados en este para no generar problemas con el nucleo del framework

    use RegistersUsers;

    /*
     * Where to redirect users after registration.
     */
    protected $redirectTo = '/';

    /*
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

     public function register(Request $request)
    {
        $comprador = "comprador";

        $userCreate = array(
            '_token' => $request->input('_token'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
            'role' => $comprador
        );
       
        $this->validator($userCreate)->validate();        

        event(new Registered($user = $this->create($userCreate)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
    /*
     * Get a validator for an incoming registration request.
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // aqui se pueden definir otros campos 
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    /*
     * Create a new user instance after a valid registration.
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);
    }

}
