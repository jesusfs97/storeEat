@extends('layout')

@section('titulo','Crear proyecto')

@section('contenido')

@include('partials.validationErrors')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">
            {{-- <h1 class="display-4">Editar  {{ $proyecto->titulo }}</h1> --}}
            <hr />
            <form  class="bg-white shadow rounded py-3 px-5" method="POST" action=" {{ route('Admin.actualizar', $proyecto) }}">
                @csrf
                @method('PATCH') {{-- lo que hace es <input type="hidden" name="_method" value="PATCH"> --}}
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input class="form-control shadow-sm bg-O @error('Nombre') is-invalid @else border-0 @enderror"
                        name="titulo"
                        id="titulo"
                        value="{{ old('titulo' , $proyecto->titulo ) }}" >
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control shadow-sm bg-O @error('descripcion') is-invalid @else border-0 @enderror"
                        name="descripcion"
                        id="descripcion">{{ old( 'descripcion' , $proyecto->descripcion ) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input class="form-control shadow-sm bg-O @error('precio') is-invalid @else border-0 @enderror"
                    type="text"
                    name="precio"
                    id="precio"
                    value="{{ old( 'url' , $proyecto->url ) }}" > 
                </div>

                <button class="btn btn-success btn-lg btn-block">Guardar</button>
                <a class="btn btn-danger btn-lg btn-block " href=" {{ route('Admin.index') }}">  Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection()