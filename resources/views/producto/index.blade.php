@extends('layout.main')

@section('content')

<h1>SISTEMAS DE VENTAS TEST</h1>

  <h2>Productos Disponibles</h2>
  <p>Usted puede Editar el Nombre y Precio de Productos existentes:</p>   

  @if ($message = Session::get('danger'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
            <p>{!! $message !!}</p>
    </div>
  @endif         
  <table class="table table-bordered">
    <thead style="background-color: #A9D0F5">
      <tr>
        <th class="text-center">Producto</th>
        <th class="text-center">Precio</th>
        <th class="text-center">Opciones</th>
      </tr>
    </thead>
    <tbody>
	
	@foreach($productos as $data)
    
      <tr>
        <td >{{ $data->nombre }}</td> 
        <td class="text-center">{{ $data->precio }}</td>      
        <td class="text-center">
        	<form style="display: inline;" method="POST" action="{{route('producto.edit', $data->id)}}">	
					{!! method_field('PUT') !!} 
					{!! csrf_field() !!} 
					<button type="submit" class="btn btn-warning">EDITAR</button>
  			</form>
          	<form style="display: inline;" method="POST" action="{{route('producto.destroy', $data->id)}}">	
  					{!! method_field('DELETE') !!} 
  					{!! csrf_field() !!} 
  					<button type="submit" onclick="return confirm('¿seguro que deseas eleiminar Producto?')" class="btn btn-danger">ELIMINAR</button>
  			</form>
        </td>        
      </tr>

	@endforeach
    
    </tbody>
  </table>



@stop