<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RolesRegisterUser;
class UserController extends Controller
{
 

    public function index()
    {
        //
        $users = User::all();
        return view('producto.usuario', compact('users'));

    }

    public function create()
    {
        //
        // return view('auth.create');
    }

    public function store(Request $request)
    {
        //
        // dd($request);
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
