@extends('layout.main')

@section('content')


<h2 >ALTA DE PRODUCTOS</h2>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<p>{!! $message !!}</p>
</div>
@endif

<form class="form-horizontal" method="POST" action="{{ route('producto.store') }}">
	{{ csrf_field() }} 
	<div class="form-group">
		<label class="control-label col-sm-2" for="email">Nombre Producto:</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nombre" placeholder="Ingrese Producto" name="nombre" value="{{ old('nombre')}}" autofocus>
			{!! $errors->first('nombre', '<span class="error">:message</span>')!!}
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="pwd">Precio:</label>
		<div class="col-sm-3">          
			<input type="number" class="form-control" id="precio" placeholder="Ingrese Precio" name="precio" value="{{ old('precio')}}">
			{!! $errors->first('precio', '<span class="error">:message</span>')!!}
		</div>
	</div>
	<div class="form-group">        
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>




@stop