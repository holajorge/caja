@extends('layout.main')

@section('content')


<h1>SISTEMAS DE VENTAS COMPRE CUANTO NECESITE!!</h1>

<h3>Productos Disponibles</h3>

<form class="form-inline">
  <div class="form-group">
    <label for="email">Nombre Producto:</label>
    <select name="myselect" id="myselect" class="form-control">
      @foreach ($productos as $producto)
      <option  name="producto" value="{{ $producto}}"
      @if ($producto == old('myselect'))
      selected="selected"
      @endif
      >{{ $producto->nombre }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">   
    <input class="form-control" type="number" id="cantidad"  name="cantidad" placeholder="cantidad de producto" required>
  </div>
  <button type="button" class="btn btn-success glyphicon glyphicon-shopping-cart btn-md" onclick="calcular()">COMPRAR</button>
</form>
<br>
<hr>

<div class="alert alert-success" role="alert">LISTA DE PRODUCTOS AGREGADOS AL CARRITO DE COMPRAS</div>

<form method="post" action="{{ route('compra.store') }}">
{{ csrf_field() }} 
<div class="table-responsive">
<table class="table table-bordered table-condensed table-hover" id="customFields">
  <thead style="background-color: #A9D0F5">
    <tr>
      <th class="text-center">OPCION</th>
      <th class="text-center">PRODUCTO</th>        
      <th class="text-center">CANTIDAD</th>
      <th class="text-center">PRECIO</th>
      <th class="text-center">SUBTOTAL</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th type="hidden"></th>
      <th type="hidden"></th>
      <th type="hidden"></th>
      <th class="text-center">TOTAL</th>     
      <th class="text-center"><h4  id="total">$ 0.00</h4></th>
    </tr>
  </tfoot>
  <tbody>
  </tbody>
</table>
</div>

 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">         
   <div class="form-group">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <button class="btn btn-danger" type="reset">Cancelar</button>
   </div>
  </div>
</form>

<script>

  $(document).ready(function(){

     $("#guardar").hide(); 

  })

  var cont=0;
  total=0;
  subtotal=[];

  function calcular(){
    var producto =  JSON.parse($('#myselect').val());
    var id_producto = producto.id;
    var nombre = producto.nombre;
    var precio = producto.precio;
    var cantidad = $('#cantidad').val();

    if (cantidad == '') {
      swal({
        title: 'CANTIDAD NECESARIO',
        text: 'cierre automatico en 2 segundos.',
        timer: 2000,
        onOpen: function () {
          swal.showLoading()
        }
      }).then(
      function () {},
    // handling the promise rejection
      function (dismiss) {
        if (dismiss === 'timer') {
          $("#cantidad").focus();
        }
      }
      )
    }else{
     var subT = cantidad*precio;
     var iva = (cantidad*precio) * .16;

     subtotal[cont] = iva + subT;

     total=total+subtotal[cont];

     var fila='<tr class="selected" id="fila'+cont+'">'
     +'<td class="text-center"><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button></td>'
     +'<td class="text-center"><input type="hidden" name="producto_id[]" value="'+id_producto+'">'+nombre+'</td>'
     +'<td class="text-center"><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td>'
     +'<td class="text-center">'+precio+'</td>'
     +'<td class="text-center"><input type="hidden" name="total[]" value="'+subtotal[cont]+'">'+subtotal[cont]+'</td></tr>';
     console.log(subtotal[cont]);
     cont++;
     limpiar();
     evaluar();
     
     $('#customFields').append(fila);
   }
  }

  function limpiar(){
    $("#cantidad").val("");
  }

  function evaluar()
  {
    if (total > 0)
    {
      $('#total').html("$" + total +" "+'PESOS');
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide(); 
    }
  }
   function eliminar(index){
    total=total-subtotal[index]; 

    console.log(total);
    $("#total").html("S/. " + total);   
    $("#fila" + index).remove();
    evaluar();

  }
</script>





@stop