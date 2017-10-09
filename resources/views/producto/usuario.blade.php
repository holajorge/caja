@extends('layout.main')

@section('content')

<h2>Usuarios</h2>

<table class="table table-bordered">
    <thead style="background-color: #A9D0F5">
      <tr>
        <th class="text-center">#ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Email</th>
        <th class="text-center">Role</th>      
      </tr>
    </thead>
    <tbody>
	
	@foreach($users as $usuario)    
      <tr>      
        <td class="text-center" >{{ $usuario->id }}</td>
        <td class="text-center">{{ $usuario->name }}</td>      
      	<td class="text-center">{{ $usuario->email }}</td>      	
      	<td class="text-center">{{ $usuario->role }}</td>
      </tr>

	@endforeach

@stop