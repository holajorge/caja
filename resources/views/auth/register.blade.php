@extends('layout.main')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">
				<div class="panel-heading">
						<a href="#" class="active" id="login-form-link">Registar</a>
						<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							
								<form  action="/register" method="post" role="form" >
									{{ csrf_field() }} 
								{{-- 	<h2 class="text-center">Registar</h2> --}}
									<div class="form-group">
										<input type="text" name="name" id="name"  class="form-control"  placeholder="Username" value="{{ old('name')}}">
										{!! $errors->first('name', '<span class="error">:message</span>')!!}
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email"  class="form-control" placeholder="Email Address" value="{{ old('email')}}">
										{!! $errors->first('email', '<span class="error">:message</span>')!!}
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password"  class="form-control" placeholder="Password">
										{!! $errors->first('password', '<span class="error">:message</span>')!!}
									</div>
									<div class="form-group">
										<input type="password" name="password_confirmation" id="confirm-password"  class="form-control" placeholder="Confirm Password">								
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" class="form-control btn btn-register ">
											</div>
										</div>
									</div>
								</form>						
								<div class="social-login">
									<p>- - - - - - - - - - - - - Registar con - - - - - - - - - - - - - </p>
									<ul>
										<li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
										<li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
										<li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
									</ul>
								</div>
								<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop