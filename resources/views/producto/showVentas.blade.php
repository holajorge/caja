@extends('layout.main')

@section('content')

 <h1>HISTORIAL DE COMPRAS DE CLIENTES</h1>

 <table class="table table-bordered">
    <thead style="background-color: #A9D0F5">
      <tr>
        <th class="text-center">Producto</th>
        <th class="text-center">Cantidad</th>
        <th class="text-center">total Compra</th>
        <th class="text-center">fecha compra</th>      
      </tr>
    </thead>
    <tbody>

     @foreach($historial as $compras)    
      <tr>      
        <td class="text-center" >{{ $compras->nombre }}</td>
        <td class="text-center">{{ $compras->cantidad }}</td>      
        <td class="text-center">{{ $compras->total }}</td>        
        <td class="text-center">{{ $compras->created_at }}</td>
      </tr>
     @endforeach
    </tbody>
 </table> 

  <h2>TOTAL DE VENTAS ASTA AHORA $ {{$totalProductos}} PESOS</h2>

@stop