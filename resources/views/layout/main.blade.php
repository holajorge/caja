<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Productos</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/auth/registrar.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{asset('css/main/footer.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{asset('css/auth/contact.css')}}">	
	<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-3.2.1.js')}}"></script>
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.js"></script>
</head>
<body>

	<header>		
		 <?php function activeMenu($url){ return request()->is($url) ? 'active' : ''; }?>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-inverse">
					<div class="container">
						<div class="navbar-header" >
							<a class="navbar-brand " href="/">SISTEMA DE VENTAS</a>
						</div>
						<ul class="nav navbar-nav">	
						
						@if( auth()->check())		
						{{-- RUTAS PARA LOS ADMINISTRADORES --}}
							@if(auth()->user()->role === 'admin')
							<li class="{{ activeMenu('producto')}}"><a href="{{ route('producto.index')}}">Porductos</a></li>							
							<li class="{{ activeMenu('nuevo')}}"><a href="{{ route('producto.create') }}">Nuevo Producto</a></li>
							<li class="{{ activeMenu('ventas')}}"><a href="{{ route('producto.show') }}">Ventas</a></li>
							<li class="{{ activeMenu('usuarios')}}"><a href="/usuarios">Usuarios</a></li>
							@endif
							@if(auth()->user()->role === 'comprador')
						{{-- VISTA PARA LOS COMPRADORES --}}
							<li class="{{ activeMenu('compra')}}"><a href="{{ route('compra.index')}}">COMPRAR</a></li>
							<li class="{{ activeMenu('historial')}}"><a href="{{ route('historial.show') }}">HISTORIAL DE COMPRAS</a></li>
							@endif
							
						@endif

						<li class="{{ activeMenu('about')}}"><a href="/about">Nosotros</a></li>
						<li class="{{ activeMenu('contact')}}"><a href="/contact">Contactonos</a></li>

						</ul>
						<ul class="nav navbar-nav navbar-right">
							@if( auth()->guest() )
							<li class="{{ activeMenu('login')}}"><a href="/login"><span class="glyphicon glyphicon-user"></span> LOGIN</a></li>
							<li class="{{ activeMenu('register')}}"><a href="/register"><span class="glyphicon glyphicon-plus-sign"></span> REGISTRAR</a></li>
							@endif

							@if( auth()->check())							
							<li><a href="/logout"><span class="glyphicon glyphicon-log-in"></span> Logout {{ auth()->user()->name}}</a></li>							
							@endif
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</header>
	
	<div class="container">
		<div class="row">
			@yield('content')
		</div>
	</div>

	<footer >
		
			<div class="container">
				<div class="row m-y">
					<div class="col-sm-8">
						<h4>Contactanos</h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</p>
					</div>
					<div class="col-sm-4">
						<h4>Direccion</h4>
						<address>
							<strong>Company, Inc.</strong><br>
							12345 Name Street, Suite 900<br>
							San Francisco, CA 94103<br>
							<abbr title="Phone">P:</abbr> (123) 555-2424
						</address>
					</div>
				</div>
			</div>
	
	</footer>
	<script type="text/javascript" src="{{ asset('js/auth/registrar.js')}}"></script>
</body>
</html>