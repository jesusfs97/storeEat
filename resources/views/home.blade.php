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
                        @forelse($Proyectos as $proyecto )
                    <li class="list-group-item border-0 mb-3 ">
                        <div class="row d-flex justify-content-between align-items-center"> 
                            <div class="col-sm-4">
                                <span class="text-secondary font-weight-bold">
                                    {{ $proyecto->titulo }}
                                </span>
                            </div>
                            <div class="col-sm-4">
                                <span class="text-secondary font-weight-bold">
                                    {{$proyecto ->precio}}
                                </span>
                            </div>
                            <div class="col-sm-4">
                                <span>
                                    {{ $proyecto->descripcion }}
                                </span>
                            </div>
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

