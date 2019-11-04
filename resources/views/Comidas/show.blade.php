@extends('layout')

@section('titulo', $proyect->titulo)

@section('contenido')
<div class="container">
    <div class="bg-white p-5 shadow rounded">
        <h1>{{ $proyect->titulo }}</h1> 
        <p>{{ $proyect->descripcion }}</p>
        <small class="text-black-50">{{ $proyect->created_at->diffForHumans()}}</small>
        <hr/>
        <div class="d-flex justify-content-between">

            <a class="btn btn-outline-success btn-lg " href=" {{ route('Admin.index') }}"> Regresar</a>
            @auth
            <div class="btn-group btn-group-lg align-items-center">

                <a class="btn rounded btn-primary mx-1" href=" {{ route('Admin.editar', $proyect) }}">Editar</a>
                <a class="btn rounded btn-danger mx-1" href="#" onclick="document.getElementById('Eliminar').submit()">Eliminar</a>
                <form class="d-none" id="Eliminar" action="{{ route('Admin.destruir' , $proyect ) }}" method="POST" >
                    @csrf  
                    @method('DELETE')
                </form>

            </div>
            @endauth
        </div>
    </div>
</div>
@endsection