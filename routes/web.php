<?php

/*
|--------------------------------------------------------------------------
| RUTAS WEB
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación.
| Estas rutas son cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo genial!
|  TODAS LAS RUTAS QUE RETORNAS DEBEN ESTAR EN LA CARPETA "VIEWS"

    Si queremos definir una ruta que responda cuando queramos acceder a la raiz del sitio web
                             
        Route::get( ' / ' , function(){  -> esto es una funcion anonima <CLOSURE>
    definimos la URL ^
            
            return view(retoramos una vista) ;
        })
        
        
        
        
        Route::get('/', function () {
            return view('welcome');
        });
        
        route::get('bienvenido', function(){
            return "hola bienvenido";
        });
        
        // Esto es una funcion con parametro obligatorio
        route::get('saludo/{nombre}', function($nombre){
            return 'saludos'. $nombre; #si se intenta meter a la ruta mandara un error
        });
        
        
        
        //esto es una ruta con parametros y son opcinales con el signo ? para que la ruta por si sola no muestre un error
        route::get('fotos/{numero?}', function($numero =" sin numero"){ // este igual va a ser remplazada por ?
            return "estas en la galeria de fotos: " . $numero;
        }) ->where('numero','[0-9]+');
        
        route::get('contactame',function(){
            return view('vista');
        })->name('vist');
        // esto es para darle nombre a la ruta y asi se mostrara en la url
        
        route::get('contactos',function(){
            return 'contacto';
        });
        
        Route::resource('usuario', 'UserController'); 
    */
    // Route::post('/añadir-carrito', 'carroController@add')->name('añadir');
    // Route::get('/Carrito_de_compras', 'carroController@cart')->name('carrito.compra');
    // Route::post('/Limpiar_carrito', 'carroController@clear')->name('carrito.vaciar');
    // Route::get('/marca/{url}', 'HomeController@brands')->name('marcas');
	// Route::get('/categorias/{url}', 'HomeController@categories')->name('categorias');
	

Route::get('/', 'ProyectController@menu')->name('home');

route::view('/contacto', 'contacto')->name('contacto');
route::post('contacto', 'ContactoController@store');

route::view('/nosotros','nosotros')->name('nosotros');

    Auth::routes();

   // Route::get('/home', 'HomeController@index')->name('home');

    //Routes

    Route::middleware(['auth'])->group(function () {

    //Roles

	Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');
		
});

route::view('/nosotros','nosotros')->name('nosotros');

# Default route when accessing the website
Route::get('/', 'WebstoreController@index');
# The home route, which is used in the authentication scaffolding
# We update the closure argument to the index function of our controller
Route::get('/home', 'WebstoreController@index')->name('home');
# Adding a product to the shopping cart
Route::get('/add/{product}', 'WebstoreController@addToCart')->name('add');
# Removing an product from the shopping cart
Route::get('/remove/{productId}', 'WebstoreController@removeProductFromCart')->name('remove');
# Clearing all products from the shopping cart
Route::get('/empty', 'WebstoreController@destroyCart')->name('empty');
# PayPal checkout
Route::get('checkout', 'PaypalController@payWithpaypal')->name('checkout');
# PayPal status callback
Route::get('status', 'PaypalController@getPaymentStatus');
# Generated routes for authentication







Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');
	//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');
	//Products
	Route::post('products/store', 'ProductController@store')->name('products.store')
		->middleware('permission:products.create');

	Route::get('products', 'ProductController@index')->name('products.index')
		->middleware('permission:products.index');

	Route::get('products/create', 'ProductController@create')->name('products.create')
		->middleware('permission:products.create');

	Route::put('products/{product}', 'ProductController@update')->name('products.update')
		->middleware('permission:products.edit');

	Route::get('products/{product}', 'ProductController@show')->name('products.show')
		->middleware('permission:products.show');

	Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
		->middleware('permission:products.destroy');

	Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
		->middleware('permission:products.edit');
});

