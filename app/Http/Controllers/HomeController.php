<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RolesSendEmail;
class HomeController extends Controller
{

    public function index()
    {
        //
        return view('home.index');
    }

    public function about(){
        return view('home.about');
    }

    public function create()
    {
        //
        return view('home.contact');
    }

    public function store(RolesSendEmail $request)
    {
        //
        $mensaje = $request->all();

        Mail::send('emails.contact', [ 'cuerpo' => $mensaje ] , function($m) use ($mensaje){
            $m->to('franciscomigueljorge@gmail.com', 'jorge')
              ->from($mensaje['email'], $mensaje['nombre'])                            
              ->subject($mensaje['asunto']);             
        });   
        return back()->with('success','Tu Mensaje con asunto' .' ' .'<strong>'.$mensaje['asunto'].'</strong>'.' '. 'fue Enviado Correctamente Te responderemos a la brevedad posible. gracias por tu preferencia!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
