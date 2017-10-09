@extends('layout.main')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<p>{!! $message !!}</p>
</div>
@endif
<section id="contact">
	<div class="section-content">				
		<h2 class="section-header">Puede Contactarnos <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Mandenos tu Mensaje</span></h2>				
	</div>

	<form method="post" action="{{route('enviar.mensaje')}}" >
		{{ csrf_field() }} 
		<div class="col-md-6 form-line">						
			<div class="form-group">
				<label for="exampleInputUsername">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre" value="{{ old('nombre')}}">
				{!! $errors->first('nombre', '<span class="error">:message</span>')!!}
			</div>
			<div class="form-group">
				<label for="exampleInputEmail">Email</label>
				<input type="email" name="email" class="form-control" placeholder=" Ingrese Email" value="{{ old('email')}}">
				{!! $errors->first('email', '<span class="error">:message</span>')!!}
			</div>	
			<div class="form-group">
				<label for="telephone">Telefono.</label>
				<input type="number" name="telefono" class="form-control" placeholder=" Ingrese 10-digitos" value="{{ old('telefono')}}">
				{!! $errors->first('telefono', '<span class="error">:message</span>')!!}
			</div>			  		
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="telephone">Asunto.</label>
				<input type="text" name="asunto" class="form-control" placeholder="Asunto" value="{{ old('asunto')}}">
				{!! $errors->first('asunto', '<span class="error">:message</span>')!!}
			</div>
			<div class="form-group">
				<label for ="description"> Descripcion del Mensaje</label>
				<textarea  class="form-control" name="descripcion" placeholder="Descripcion">{{ old('descripcion')}}</textarea>
				{!! $errors->first('descripcion', '<span class="error">:message</span>')!!}
			</div>
			<div>
				<button type="submit" class="btn btn-primary submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Enviar</button>
			</div>			  			
		</div>
	</form>	

</section>


<div style=" width: 100%; height: 250px;">				
	{!! Mapper::render()  !!}				
</div>		

@stop