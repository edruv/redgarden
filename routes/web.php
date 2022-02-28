<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.front');
// });

Route::name('front.')->group(function(){

	Route::get('/', 'FrontController@index')->name('index');
	Route::get('nosotros', 'FrontController@aboutus')->name('aboutus');
	Route::get('contacto', 'FrontController@contacto')->name('contacto');
	Route::get('productos/{product?}', 'FrontController@productos')->name('productos');
	Route::get('producto/{product}', 'FrontController@details')->name('details');
	Route::get('producto/det/var', 'FrontController@prodvar')->name('prodvar');
	Route::get('servicios', 'FrontController@servicios')->name('servicios');
	Route::get('servicio/{serv}', 'FrontController@servicioDet')->name('servicioDet');

});


	// rutas carrito
	Route::prefix('cart')->name('cart.')->group(function(){
		Route::post('addcart','CartController@store')->name('addcart');
		Route::get('emptycart','CartController@emptycart')->name('emptycart');
		Route::get('removecart','CartController@removecart')->name('removecart');
		Route::post('getcart','CartController@getcart')->name('getcart');

		Route::get('detalles','CartController@show')->name('show');
		Route::get('confirmar-pedido','CartController@confirm')->name('confirm');
		Route::post('pedido','PedidoController@store')->name('store');
		// Route::post('/sendCoti','CartController@sendMail')->name('sendMail');

		Route::post('direccion','DomicilioController@store')->name('storeDir');

		Route::post('getdomicilio','CartController@getDomicilio')->name('getDomicilio');
		Route::get('getPackages','CartController@getPackages')->name('getPackages');
	});

	// vistas del dashboard del usuario
	Route::prefix('dashboard')->name('dash.')->group(function(){
		Route::get('/','HomeController@index')->name('index');
		Route::get('perfil','HomeController@perfil')->name('perfil');
		Route::post('update','HomeController@updatePass')->name('updatePass');
		Route::get('mi-perfil','HomeController@perfil')->name('perfil');

		// Route::prefix('mi-red')->name('network.')->group(function(){
		// 	Route::get('/','HomeController@mynetwork')->name('mynetwork');
		// });

		Route::prefix('mis-compras')->name('compras.')->group(function(){
			Route::get('/','HomeController@compras')->name('index');
			Route::get('detalle/{id}','HomeController@detalle')->name('detalle');
		});

		Route::name('profile.')->group(function(){
			Route::post('store','DomicilioController@store')->name('store');
			Route::post('delete','DomicilioController@destroy')->name('delete');
		});

		Route::get('orden/{uuid}','HomeController@orden')->name('orden');
	});

	Route::prefix('paypal')->name('paypal.')->group(function(){
		Route::get('/pay/{uid}', 'PaymentController@payWithPayPal')->name('paypalpay');
		Route::post('/status', 'PaymentController@payPalStatus')->name('paypalstatus');
		Route::post('/ipn', 'PaymentController@payPalIpn')->name('paypalipn');
		// Route::get('/paySub/{uid}', 'PaymentController@payWithPayPalSub')->name('paypalpay2');
		// Route::get('/statusTwo', 'PaymentController@payPalStatusTwo')->name('paypalstatusSub');
	});

// rutas al admin
Route::namespace("Admin")->prefix('admin')->group(function(){
	Route::name('admin.')->group(function(){
		Route::get('/', 'HomeController@index')->name('home');
		Route::get('/nuevo', 'HomeController@create')->name('create');
		Route::get('/users', 'HomeController@show')->name('show');
		Route::post('/guardar', 'HomeController@store')->name('store');
		Route::delete('/delete', 'HomeController@destroy')->name('delete');

		Route::namespace('Auth')->group(function(){
			Route::get('/login', 'LoginController@showLoginForm')->name('login');
			Route::post('/login', 'LoginController@login');
			Route::post('logout', 'LoginController@logout')->name('logout');
		});
	});

// rutas al admin configuraciones
// controllers dentro de Controllers/Admin/
	Route::prefix('config')->name('config.')->group(function(){
		Route::get('index','ConfiguracionController@index')->name('index');
		Route::get('general','ConfiguracionController@general')->name('general');
		Route::get('contacto','ConfiguracionController@contact')->name('contact');
	});
	// Route::prefix('config')->name('config.')->group(function(){
	// 	Route::get('index','ConfiguracionController@index')->name('index');
	// });
});

// rutas al admin configuraciones
// controllers dentro de Controllers/
Route::prefix('admin')->group(function(){
	Route::prefix('config')->name('config.')->group(function(){

		Route::prefix('colores')->name('color.')->group(function(){
			Route::get('/','ColorController@index')->name('index');
			Route::post('/','ColorController@store')->name('store');
			Route::get('editar/{id}','ColorController@edit')->name('edit');
			Route::put('{id}','ColorController@update')->name('update');
			Route::delete('/','ColorController@destroy')->name('delete');
		});

		Route::prefix('sliders')->name('slider.')->group(function(){
			Route::get('/{seccion?}','CarruselController@index')->name('index');
			Route::post('/','CarruselController@store')->name('store');
			Route::delete('/','CarruselController@destroy')->name('delete');
		});
		Route::prefix('usuarios')->name('usuarios.')->group(function(){
			Route::get('/','HomeController@index')->name('index');
			//Route::post('/','CarruselController@store')->name('store');
			//Route::delete('/','CarruselController@destroy')->name('delete');
		});

		Route::prefix('politicas')->name('politica.')->group(function(){
			Route::get('/','PoliticaController@index')->name('index');
			Route::put('/{id}','PoliticaController@update')->name('update');
		});

		Route::prefix('secciones')->name('seccion.')->group(function(){
			Route::get('/','SeccionController@index')->name('index');
			Route::get('/{slug}','SeccionController@show')->name('show');
			Route::put('/{id}','ElementoController@update')->name('update');
			Route::put('/portada/{id}', 'SeccionController@update')->name('updatePortada');
		});

		Route::prefix('faq')->name('faq.')->group(function(){
			Route::get('/','FaqController@index')->name('index');
			Route::get('nueva','FaqController@create')->name('create');
			Route::post('/','FaqController@store')->name('store');
			Route::get('{id}','FaqController@edit')->name('edit');
			Route::put('{id}','FaqController@update')->name('update');
			Route::delete('/','FaqController@destroy')->name('delete');
		});

		Route::prefix('dimension')->name('size.')->group(function(){
			// NOTE:  falta method edit
			Route::get('/','CategTamanoController@index')->name('index');
			Route::post('/','CategTamanoController@store')->name('store');
			Route::delete('/','CategTamanoController@destroy')->name('delete');

			Route::name('dimension.')->group(function(){
				// NOTE:  falta method edit
				Route::get('/{slug?}','SizeController@index')->name('index');
				Route::post('t','SizeController@store')->name('store');
				Route::delete('t','SizeController@destroy')->name('delete');
			});
		});

		Route::prefix('cupones')->name('cupons.')->group(function(){
			// NOTE:  falta method edit
			Route::get('/','CuponController@index')->name('index');
			Route::post('/','CuponController@store')->name('store');
			Route::delete('d','CuponController@destroy')->name('delete');
		});

		Route::prefix('politicas')->name('politica.')->group(function(){
			Route::get('/','PoliticaController@index')->name('index');
			Route::put('/{id}','PoliticaController@update')->name('update');
		});
	});

	Route::prefix('productos')->name('productos.')->group(function () {
		Route::get('/', 'ProductoController@index')->name('index');
		Route::get('nuevo', 'ProductoController@create')->name('create');
		Route::post('nuevo', 'ProductoController@store')->name('store');
		Route::get('detalle/{id}', 'ProductoController@show')->name('show');
		Route::get('{id}', 'ProductoController@edit')->name('edit');
		Route::put('{id}', 'ProductoController@update')->name('update');
		Route::put('upimg/{id}', 'ProductoController@updateimg')->name('updateimg');
		Route::post('delete', 'ProductoController@destroy')->name('delete');

		Route::name('pic.')->group(function () {
			Route::post('newpic/{id}', 'ProductosPhotoController@store')->name('store');
			Route::delete('/', 'ProductosPhotoController@destroy')->name('delete');
		});

		Route::name('variantes.')->group(function () {
			Route::post('newvar/', 'ProductoVarianteController@store')->name('store');
			Route::get('variante/{id_var}', 'ProductoVarianteController@show')->name('show');
			Route::get('variante/edit/{id_var}', 'ProductoVarianteController@edit')->name('edit');
			Route::put('variante/{id_var}', 'ProductoVarianteController@update')->name('update');
		});

		// Route::name('version.')->group(function () {
		// 	Route::post('newvar/', 'ProductoVarianteController@store')->name('store');
		// 	Route::get('variante/{id_var}', 'ProductoVarianteController@show')->name('show');
		// 	Route::get('variante/edit/{id_var}', 'ProductoVarianteController@edit')->name('edit');
		// 	Route::put('variante/{id_var}', 'ProductoVarianteController@update')->name('update');
		// 	Route::delete('pv/', 'ProductoVersionPhotoController@destroy')->name('delete');
		// });

		// Route::name('medida.')->group(function () {
		// 	Route::post('nueva', 'ProductoMedidaController@store')->name('store');
			// Route::get('{id_var}', 'ProductoMedidaController@show')->name('show');
			// Route::get('edit/{id_var}', 'ProductoMedidaController@edit')->name('edit');
			// Route::put('/{id_var}', 'ProductoMedidaController@update')->name('update');
		// 	Route::delete('pv/', 'ProductoMedidaController@destroy')->name('delete');
		// 	Route::get('destroy/{id}', 'ProductoMedidaController@destroy')->name('delete');
		// });

		Route::name('rel.')->group(function(){
			Route::put('rel/{id}','ProductoRelacionController@update')->name('update');
			// Route::delete('rel/','ProductoRelacionController@destroy')->name('delete');
		});

	});

	Route::prefix('tratamientos')->name('tratamiento.')->group(function () {
		Route::get('/', 'TratamientoController@index')->name('index');
		Route::get('nuevo', 'TratamientoController@create')->name('create');
		Route::post('nuevo', 'TratamientoController@store')->name('store');
		Route::get('detalle/{tratamiento}', 'TratamientoController@show')->name('show');
		Route::get('editar/{tratamiento}', 'TratamientoController@edit')->name('edit');
		Route::put('{tratamiento}', 'TratamientoController@update')->name('update');
		Route::put('upimg/{tratamiento}', 'TratamientoController@updateimg')->name('updateimg');
		Route::post('delete', 'TratamientoController@destroy')->name('delete');

		Route::name('pic.')->group(function () {
			Route::post('newpic/{id}', 'TratamientosPhotoController@store')->name('store');
			Route::delete('/', 'TratamientosPhotoController@destroy')->name('delete');
		});

		Route::name('rel.')->group(function(){
			Route::put('rel/{id}','ProductoRelacionController@update')->name('update');
			// Route::delete('rel/','ProductoRelacionController@destroy')->name('delete');
		});

	});

	Route::prefix('servicios')->name('servicio.')->group(function () {
		Route::get('/', 'ServicioController@index')->name('index');
		Route::get('nuevo', 'ServicioController@create')->name('create');
		Route::post('nuevo', 'ServicioController@store')->name('store');
		Route::get('detalle/{servicio}', 'ServicioController@show')->name('show');
		Route::get('editar/{servicio}', 'ServicioController@edit')->name('edit');
		Route::put('{servicio}', 'ServicioController@update')->name('update');
		Route::put('upimg/{servicio}', 'ServicioController@updateimg')->name('updateimg');
		Route::post('delete', 'ServicioController@destroy')->name('delete');

		Route::name('pic.')->group(function () {
			Route::post('newpic/{id}', 'ServiciosPhotoController@store')->name('store');
			Route::delete('/', 'ServiciosPhotoController@destroy')->name('delete');
		});
	});

	Route::prefix('categorias')->name('categ.')->group(function(){
		Route::get('/','CategoriaController@index')->name('index');
		Route::post('/','CategoriaController@store')->name('store');
		Route::get('/{id}','CategoriaController@show')->name('show');
		Route::get('subcategoria/{id}','CategoriaController@sub')->name('sub');
		Route::post('/delete','CategoriaController@destroy')->name('delete');
	});

	Route::prefix('novedades')->name('novedades.')->group(function () {
		Route::get('/', 'NovedadController@index')->name('index');
		Route::get('nuevo', 'NovedadController@create')->name('create');
		Route::post('nuevo', 'NovedadController@store')->name('store');
		Route::get('details/{id}', 'NovedadController@show')->name('show');
		Route::get('edit/{id}', 'NovedadController@edit')->name('edit');
		Route::put('up/{id}', 'NovedadController@update')->name('update');
		Route::post('delete', 'NovedadController@destroy')->name('delete');

		// Route::name('pic.')->group(function () {
		// 	Route::post('newpic/{id}', 'NovedadController@store')->name('store');
		// 	Route::delete('/', 'NovedadController@destroy')->name('delete');
		// });

	});

	Route::prefix('clientes')->name('clientes.')->group(function(){
		Route::get('/','UserController@index')->name('index');
		Route::get('detalle/{id}','UserController@show')->name('show');
		Route::post('delele','UserController@destroy')->name('delete');
	});

	Route::prefix('pedidos')->name('pedidos.')->group(function(){
		Route::get('/','PedidoController@index')->name('index');
		Route::get('detalle/{id}','PedidoController@show')->name('show');
		Route::post('changeStatus', 'PedidoController@changeStatus')->name('changeStatus');
		Route::delete('/','PedidoController@destroy')->name('delete');
	});
});

// rutas funciones generales
Route::prefix('varios')->name('func.')->group(function(){
	Route::post('editarajax','FuncGenController@editajax')->name('editajax');
	Route::post('orderajax','FuncGenController@orderajax')->name('orderajax');
	Route::post('toggleajax','FuncGenController@toggleajax')->name('toggleajax');

	Route::post('addcart','CartController@addcart')->name('addcart');
	Route::get('emptycart','CartController@emptycart')->name('emptycart');
	Route::post('getcart','CartController@getcart')->name('getcart');
	Route::get('updatecart','CartController@update')->name('updatecart');

	Route::post('setLang','FuncGenController@setlang')->name('setlang');
	Route::post('getPresents','FuncGenController@getPresents')->name('getPresents');
});

// rutas test
Route::prefix('test')->group(function(){
	Route::get('strand',function(){
		return Str::random(15);
	});
	Route::get('uuid',function(){
		return Str::uuid();
	});

	Route::get('referido/{key}','TestController@referido')->name('referido');
	// Route::get('referidos/{tope}/{key}','TestController@referidosN')->name('referidosxxx');
	Route::get('referidos/{tope}/{key}','UserController@referidosN')->name('referidos');
	Route::get('referidodiag/{tope}/{key}','TestController@referidoschart')->name('referidosChart');

	Route::get('pdf', function () {
		$carrito = '{"4":{"id":4,"name":"aloe vera 59ff","price":499,"quantity":1,"attributes":{"clave":"24pk","puntos":20.64,"tax":24.4,"image":"dAgEcmFbBRVBydpayvd0fgDzEYOzrw.jpg"},"conditions":[],"associatedModel":{"id":4,"nombre":"aloe vera 59ff","clave":"24pk","descripcion":"<p>Recusandae dicta illo voluptas id harum error quis atque provident nihil impedit sunt quo nihil et ut velit doloribus architecto.<\/p>","puntos":20.64,"precio_publico":499,"precio_ei":299.4,"precio_cc":284.43,"precio_a":274.45,"precio_b":249.5,"fxc":0,"peso":2.77,"iva":24.4,"detalles":null,"detalles_photo":null,"beneficios":null,"instrucciones":null,"slug":"aloe-vera-59ff","metaDescripcion":null,"llave":null,"stock":0,"inicio":1,"activo":1,"orden":0,"created_at":"2021-04-15 15:56:40","updated_at":"2021-05-21 18:27:57"}},"1":{"id":1,"name":"Opc-95 Plus","price":472,"quantity":1,"attributes":{"clave":"op","puntos":19.4,"tax":32.55,"image":"1NgmuVcKuBW3dNSUxDgCPmvzzpINmx.jpg"},"conditions":[],"associatedModel":{"id":1,"nombre":"Opc-95 Plus","clave":"op","descripcion":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<\/p>","puntos":19.4,"precio_publico":472,"precio_ei":283,"precio_cc":271,"precio_a":260,"precio_b":236,"fxc":6,"peso":0.5,"iva":32.55,"detalles":"<p>asdfas asdfdsf<\/p>","detalles_photo":null,"beneficios":"<p>asdfas asdfdsf 2<\/p>","instrucciones":"<p>asdfas asdfdsf 3<\/p>","slug":"opc-95-plus","metaDescripcion":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim","llave":null,"stock":0,"inicio":1,"activo":1,"orden":3,"created_at":"2021-04-02 15:48:11","updated_at":"2021-05-21 18:25:09"}},"7":{"id":7,"name":"hi 88rm","price":615,"quantity":2,"attributes":{"clave":"10sk","puntos":19.54,"tax":16.95,"image":"6nBwB6zH6buPNd9KmN188KzEwEK5D9.jpg"},"conditions":[],"associatedModel":{"id":7,"nombre":"hi 88rm","clave":"10sk","descripcion":"Aut et est eius nostrum commodi quas quia cumque repudiandae itaque neque autem commodi quidem possimus non enim adipisci deserunt.","puntos":19.54,"precio_publico":615,"precio_ei":369,"precio_cc":350.55,"precio_a":338.25,"precio_b":307.5,"fxc":7,"peso":0.2,"iva":16.95,"detalles":null,"detalles_photo":null,"beneficios":null,"instrucciones":null,"slug":"hi-88rm","metaDescripcion":null,"llave":null,"stock":0,"inicio":1,"activo":1,"orden":6,"created_at":"2021-04-15 15:56:40","updated_at":"2021-05-11 15:33:50"}}}';
		$ped = '{"id":1,"uid":"10b4d489-2bca-431b-8717-49da5a69a9c3","estatus":0,"guia":null,"linkguia":null,"domicilio":{"id":1,"alias":"trabajo","calle":"av lapizlazuli","numext":"2074","numint":null,"entrecalles":"maria mares y maria benitez","colonia":"victoria","cp":"44890","municipio":"guadalajara","estado":"Jalisco","pais":"Mexico","favorito":null,"user":1,"created_at":"2021-05-27 19:26:58","updated_at":"2021-05-27 19:26:58"},"factura":null,"cantidad":2,"importe":1069,"iva":171.04,"envio":0,"comprobante":null,"cupon":null,"cancelado":0,"usuario":1,"data":"{\"4\":{\"id\":4,\"name\":\"aloe vera 59ff\",\"price\":499,\"quantity\":1,\"attributes\":{\"clave\":\"24pk\",\"puntos\":20.64,\"tax\":24.4,\"image\":\"dAgEcmFbBRVBydpayvd0fgDzEYOzrw.jpg\"},\"conditions\":[],\"associatedModel\":{\"id\":4,\"nombre\":\"aloe vera 59ff\",\"clave\":\"24pk\",\"descripcion\":\"<p>Recusandae dicta illo voluptas id harum error quis atque provident nihil impedit sunt quo nihil et ut velit doloribus architecto.<\\\/p>\",\"puntos\":20.64,\"precio_publico\":499,\"precio_ei\":299.4,\"precio_cc\":284.43,\"precio_a\":274.45,\"precio_b\":249.5,\"fxc\":0,\"peso\":2.77,\"iva\":24.4,\"detalles\":null,\"detalles_photo\":null,\"beneficios\":null,\"instrucciones\":null,\"slug\":\"aloe-vera-59ff\",\"metaDescripcion\":null,\"llave\":null,\"stock\":0,\"inicio\":1,\"activo\":1,\"orden\":0,\"created_at\":\"2021-04-15 15:56:40\",\"updated_at\":\"2021-05-21 18:27:57\"}},\"2\":{\"id\":2,\"name\":\"royal gel 94ka\",\"price\":570,\"quantity\":1,\"attributes\":{\"clave\":\"93sg\",\"puntos\":9.8,\"tax\":25.16,\"image\":\"Ygivho8I4EQzBKtdLFyWDrJEJxp7kw.jpg\"},\"conditions\":[],\"associatedModel\":{\"id\":2,\"nombre\":\"royal gel 94ka\",\"clave\":\"93sg\",\"descripcion\":\"Rerum molestiae dolorem natus et animi placeat molestias aut tempore quia id ipsum maxime sequi dolores vel labore in alias.\",\"puntos\":9.8,\"precio_publico\":570,\"precio_ei\":342,\"precio_cc\":324.9,\"precio_a\":313.5,\"precio_b\":285,\"fxc\":5,\"peso\":2.57,\"iva\":25.16,\"detalles\":null,\"detalles_photo\":null,\"beneficios\":null,\"instrucciones\":null,\"slug\":\"royal-gel-94ka\",\"metaDescripcion\":null,\"llave\":null,\"stock\":0,\"inicio\":0,\"activo\":1,\"orden\":1,\"created_at\":\"2021-04-15 15:56:40\",\"updated_at\":\"2021-05-21 18:25:09\"}}}","deleted_at":null,"created_at":"2021-05-28 16:56:32","updated_at":"2021-05-28 16:56:32"}';
		$user = '{"id":1,"name":"yahir","lastname":"lopez","username":null,"email":"yahir@wozial.com","email_verified_at":null,"telefono":null,"facebook":null,"empresa":null,"avatar":null,"rfc":null,"nivel":0,"distr_code":"yahlop_6211","referido_by":null,"distribuidor":0,"profile":null,"activo":1,"role":null,"created_at":"2021-05-20 18:46:31","updated_at":"2021-05-20 18:46:31","deleted_at":null}';
		$detalles = json_decode($carrito);
		$user = json_decode($user);
		$pedido = json_decode($ped);
		return view('admin.pedidos.invoice',compact('detalles','user','pedido'));
	});

	Route::get('slug/{key}', function ($llave) {
		return Str::slug($llave,'-');
	});
});

// Route::namespace("Admin")->prefix('admin')->prefix('config')->name('config.')->group(function(){
// 	Route::get('/','ConfiguracionController@index')->name('index');
// });

/** rutas de los formularios de contacto */
Route::post('/formularioContac', 'FrontController@mailcontact')->name('formularioContac');

Route::post('/formularioPieza', 'FrontController@mailcontactPieza')->name('formularioPieza');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('clear')->group(function(){
	//Clear Cache facade value:
	Route::get('/clear-cache', function() {
		$exitCode = Artisan::call('cache:clear');
		return '<h1>Cache facade value cleared</h1>';
	});

	//Reoptimized class loader:
	Route::get('/optimize', function() {
		$exitCode = Artisan::call('optimize');
		return '<h1>Reoptimized class loader</h1>';
	});

	//Route cache:
	Route::get('/route-cache', function() {
		$exitCode = Artisan::call('route:cache');
		return '<h1>Routes cached</h1>';
	});

	//Clear Route cache:
	Route::get('/route-clear', function() {
		$exitCode = Artisan::call('route:clear');
		return '<h1>Route cache cleared</h1>';
	});

	//Clear View cache:
	Route::get('/view-clear', function() {
		$exitCode = Artisan::call('view:clear');
		return '<h1>View cache cleared</h1>';
	});

	//Clear Config cache:
	Route::get('/config-cache', function() {
		$exitCode = Artisan::call('config:cache');
		return '<h1>Clear Config cleared</h1>';
	});
});
