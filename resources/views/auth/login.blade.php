@extends('layout.main')


@section('content')


<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login text-center">
					<div class="panel-heading">
						<a href="#" class="active" id="login-form-link">Login</a>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="/login" method="post" role="form" style="display: block;">
										{{ csrf_field() }} 
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="email" value="">
										
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">										
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">No recuerdad tu password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>	
								<div class="social-login">
								<p>- - - - - - - - - - - - - Iniciar con - - - - - - - - - - - - - </p>
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