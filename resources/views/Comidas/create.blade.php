@extends('layout')

@section('titulo','Crear proyecto')

@section('contenido')

@include('partials.validationErrors')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">
            <h1 class="display-4">Agregar comida</h1>
            <hr />
            <form  class="bg-white shadow rounded py-3 px-5" method="POST" action=" {{ route('Admin.guardar') }}">

                @csrf
                <div class="form-group">
                    <label for="titulo">Nombre</label>
                    <input class="form-control shadow-sm bg-O @error('titulo') is-invalid @else border-0 @enderror"
                        type="text"
                        name="titulo"
                        id="titulo"
                        value="{{ old('titulo') }}">
                </div>
                

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>    
                    <textarea class="form-control shadow-sm bg-O @error('descripcion') is-invalid @else border-0 @enderror"
                    name="descripcion"
                    id="descripcion">
                    {{ old('descripcion') }}</textarea> 
                    
                    
                    @error('Contenido')
                    <span class="invalid-feedback" role="alert">
                        <strong> {{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                
                <div class="form-group">

                    <label for="precio">Precio</label>
                    <input class="form-control shadow-sm bg-O @error('precio') is-invalid @else border-0 @enderror"
                        type="text"
                        name="precio"
                        id="precio"
                        value="{{ old('titulo' ) }}" >
                </div>
                

                <button class="btn btn-success btn-group-lg btn-block"> Añadir</button>
                <a class="btn btn-danger btn-group-lg btn-block" href=" {{ route('Admin.index') }}">Regresar</a>
            </form>

@endsection()