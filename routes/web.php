<?php

 //agragar datos a cualquier tabla des de router 
 // Route::get('test', function(){
	// $user = new App\User;
 // 	$user->name = "jorge";
 // 	$user->email = "jorge@gmail.com";
	// $user->password = bcrypt('jorge123');
	// $user->role = "admin";
 // 	$user->save();
 // });


// vista del home (login y crear usuarios con roles)
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('about', 'HomeController@about');

Route::get('contact', function(){	
	// Mapper::streetview(18.515312, -88.305805, 1, 1, ['ui' => false]);
   	Mapper::map(
   	18.515312, -88.305805,
   	[
   		'zoom' => 14,
   		'draggable' =>true,
   		'markers' => ['title' => 'My Location', 'animation' => 'DROP'],
   		'cluster' => ['size' => 10, 'center' => true, 'zoom' => 20],   		
   		// 'eventAfterLoad' => 'circleListener(maps[0].shapes[0].circle_0);'
   	]
   );
   return view('home.contact');
});

Route::post('enviar/mensaje', ['as' => 'enviar.mensaje' , 'uses' =>  'HomeController@store']);

// para el login de usuarios
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login',['as' => 'login' , 'uses' => 'Auth\LoginController@login']);

Route::get('logout', 'Auth\LoginController@logout');

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register' , 'Auth\RegisterController@register');

// vista de compra de productos
Route::group(['middleware' => ['auth', 'prevent-back-history']], function(){


	Route::get('usuarios' , 'UserController@index');

	Route::get('producto', ['as' => 'producto.index', 'uses' => 'ProductosController@index']);
	Route::get('nuevo', ['as' => 'producto.create', 'uses' => 'ProductosController@create']);
	Route::post('guardar/producto', ['as' => 'producto.store', 'uses' => 'ProductosController@store']);
	Route::get('ventas', ['as' => 'producto.show', 'uses' => 'ProductosController@show']);
	Route::put('actualizar/{id}/edit', ['as' => 'producto.edit', 'uses' => 'ProductosController@edit']);
	Route::put('actualizar/{id}', ['as' => 'producto.update', 'uses' => 'ProductosController@update']);
	Route::delete('eliminar/{id}' , ['as' => 'producto.destroy' , 'uses' => 'ProductosController@destroy']);

	// vista de historial de compras
	Route::get('compra', ['as' => 'compra.index' , 'uses' => 'ComprasController@index']);
	Route::get('compra/productos', ['as' => 'compra.create' , 'uses' => 'ComprasController@create']);
	Route::post('guardar/compra', ['as' => 'compra.store' , 'uses' => 'ComprasController@store']);
	Route::get('historial', ['as' => 'historial.show' , 'uses' => 'ComprasController@show']);
	Route::delete('eliminar', ['as' => 'compra.destroy' , 'uses' => 'ComprasController@destroy']);

});



