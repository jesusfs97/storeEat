    <nav class="navbar navbar-light bg-white navbar-expand-md shadow-sm">
        <div class="container">
            <a href="{{ route('home')}}" class="navbar-brand">
                {{ config('app.name')}}
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="nav nav-pills"> <!-- Es importante que en "routeIs" ocupemos en NOMBRE de la ruta -->
                {{--<li class=" {{ request()->routeIs('home') ? 'active' : '' }}" ><a href="/">Home</a></li> --}}
                <li class=" nav-item" >
                    <a class="nav-link {{ modoActivo('home') }}" href="{{ route('home') }}">Inicio</a>
                </li>


                <li class="nav-item" >
                    <a class="nav-link {{ modoActivo( 'nosotros' )}}" href="{{ route('nosotros') }}">Nosotros</a>
                </li>


                
                
                <li class="nav-item" >
                    <a class="nav-link {{ modoActivo( 'contacto' )}}" href="{{ route('contacto')}}">Contactanos</a>
                </li>
                
                
                
                @auth
                
                <li class="nav-item" >
                    <a class="nav-link {{ modoActivo( 'Admin*' ) }}" href="{{ route('Admin.index')}}">Administrar</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesion
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#shoppingCartModal">
                        Cart
                    </button>
                </li>

                 <!-- Shopping cart modal -->
                 <div class="modal fade" id="shoppingCartModal" tabindex="-1" role="dialog"
                 aria-labelledby="shoppingCartModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="shoppingCartModalTitle">Shopping cart</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $cartItem)
                                    <tr>
                                        <td>
                                            <!-- Remove product button -->
                                            <a href="{{ route('remove', [ $cartItem->rowId ]) }}">x</a>
                                        </td>
                                        <td>{{ $cartItem->name }}</td>
                                        <td>{{ $cartItem->qty }}</td>
                                        <td>{{ $cartItem->price }} $</td>
                                        <td>{{ $cartItem->total }} $</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <!-- Total price of whole cart -->
                                    <td class="uk-text-bold">Total: {{ number_format(Cart::subtotal(),2) }} $</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <!-- Clear shopping cart button -->
                            <a href="{{ route('empty') }}" class="btn btn-danger">Vaciar</a>
                            <!-- Proceed to checkout button -->
                            <a href="{{ route('checkout') }}" class="btn btn-primary">Pagar</a>
                        </div>
                    </div>
                </div>
            </div>

                @can('products.index')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index') }}">Productos</a>
                </li>
                @endcan
                @can('users.index')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index') }}">Usuarios</a>
                </li>
                @endcan
                @can('roles.index') <!--Nombre del permiso-->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('roles.index') }}">Roles</a> <!--Nombre de la ruta-->
                </li>
                @endcan
                

                @else 

                    <li class="nav-item">
                        <a class="nav-link {{ modoActivo( 'login' )}}" href="{{ route('login') }}">
                            Iniciar sesion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ modoActivo( 'register' )}}" href="{{ route('register') }}">Registro</a>
                    </li>
                @endauth
                </ul>
            </div>
        </div>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>