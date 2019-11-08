<?php	
# Ruta defaul cuando ingresando al sitio
Route::get('/', 'WebstoreController@index');
# Hacemos update al argumento de closure a funcion index de nuestro controlador
Route::get('/home', 'WebstoreController@index')->name('home');

//Rutas sin Login
route::view('/contacto', 'contacto')->name('contacto');
route::post('contacto', 'ContactoController@store');
route::view('/nosotros','nosotros')->name('nosotros');



//Routes

    // Route::middleware(['auth'])->group(function () {

    //Roles Duplicate?? si es duplicado favor de borrarlo

//     Route::post('roles/store', 'RoleController@store')->name('roles.store')
//         ->middleware('permission:roles.create');

//     Route::get('roles', 'RoleController@index')->name('roles.index')
//         ->middleware('permission:roles.index');

//     Route::get('roles/create', 'RoleController@create')->name('roles.create')
//         ->middleware('permission:roles.create');

//     Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
//         ->middleware('permission:roles.edit');

//     Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
//         ->middleware('permission:roles.show');

//     Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
//         ->middleware('permission:roles.destroy');

//     Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
//         ->middleware('permission:roles.edit');
        
// });



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
        # Agregando producto al carro
    Route::get('/add/{product}', 'WebstoreController@addToCart')->name('add');
    # Remover producto del carro
    Route::get('/remove/{productId}', 'WebstoreController@removeProductFromCart')->name('remove');
    # Quitar toda la mercancia del carrito vaciarlo
    Route::get('/empty', 'WebstoreController@destroyCart')->name('empty');
    # PayPal checkout
    Route::get('checkout', 'PaypalController@payWithpaypal')->name('checkout');
    # PayPal status callback
    Route::get('status', 'PaypalController@getPaymentStatus');

});

Auth::routes();