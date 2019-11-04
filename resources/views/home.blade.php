@extends('layout')

@section('titulo','home')


@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-12">
            @auth
            <h3>BIENVENIDO: {{ auth()->user()->name}} </h3>
            @endauth
            
            <h1>Inicio</h1>
            
            <div class="container">
                <div class="row pb-3">
                    <div class="col-12">
                        <img class=" display-4 img-fluid" src="img/desayuno.png" alt="elige tu desayuno">
                    </div>
                </div>
                <ul class="list-group">
                        @forelse($products as $product)
                    <li class="list-group-item border-0 mb-3 ">
                        <div class="row d-flex justify-content-between align-items-center"> 
                            <div class="col-sm-4">
                                <span class="text-secondary font-weight-bold">
                                    {{ $product->name }}
                                </span>
                            </div>
                            <div class="col-sm-4">
                                <span class="text-secondary font-weight-bold">
                                    {{ number_format($product->price, 2) }}
                                </span>
                            </div>
                            @auth
                                
                            <div class="col-sm-4">
                                <span>
                                    <a href="{{ route('add', [ $product->getRouteKey() ]) }}">
                                            <!-- The button for adding the product to the cart -->
                                            <button class="btn btn-primary">Añadir al carrito</button>
                                    </a>
                                        {{-- {{ $proyecto->descripcion }} --}}
                                </span>
                            </div>
                            @else
                            <div class="col-sm-4">
                                <span>
                                    Para comprar registrate
                                </span>
                            </div>
                            @endauth

                        </div>
                    </li>
                                
                    <hr />     
                    @empty     
                        <li class="list-group-item border-0 mb-3">Por el momento no tenemos Desayunos</li>                                
                    @endforelse()             
                    
                    
                </ul>
            </div>
        </div>
    </div>
</div>


    





@endsection()

