@extends('layout')

@section('titulo','contacto')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">

            
            @if(session('status'))
            {{ session('status')}}
            @else
            
            
            <form class="bg-white shadow rounded py-3 px-5 "  method="POST" action=" {{ route('contacto') }}">
                    
                    @csrf {{-- esto sirve para generar un token y proteger la pagina de ataque xss --}}
                <div class="form-group">
                    <h1 class="display-4">Contacto</h1>
                    <hr />

                    <label for="Nombre">Nombre:</label>
                    <input class="form-control shadow-sm bg-O @error('Nombre') is-invalid @else border-0 @enderror"
                        id="Nombre"
                        name="Nombre"
                        placeholder="Nombre..."
                        value="{{ old('Nombre') }}" > 

                        @error('Nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="Correo">Correo:</label>
                    <input class="form-control shadow-sm bg-O @error('Correo') is-invalid @else border-0 @enderror"
                            type="text"
                        name="Correo"
                        placeholder="Email" 
                        value="{{old('Correo')}}">

                        @error('Correo')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="Asunto">Asunto:</label>
                    <input class="form-control shadow-sm bg-O @error('Asunto') is-invalid @else border-0 @enderror"
                        type="text"
                        name="Asunto"
                        placeholder="Asunto"
                        value="{{ old('Asunto') }}"> 
                
                        @error('Asunto')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="Contenido">Mensaje:</label>
                    <textarea class="form-control shadow-sm bg-O @error('Asunto') is-invalid @else border-0 @enderror" name="Contenido"placeholder="Escribe aqui tu mensaje...">

                        {{old('Contenido')}}

                    </textarea> 

                    @error('Contenido')
                    <span class="invalid-feedback" role="alert">
                        <strong> {{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button class="btn btn-danger btn-group-lg btn-block" >Enviar</button>
            
            </form>
        </div>
    </div>
</div>
@endif
@endsection()