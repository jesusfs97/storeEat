<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\MensajeRecibido;


class ContactoController extends Controller
{
    public function store(){

        // esto es para hacer la validacion de los cmpos en el formulario 
        $mensaje = request()->validate([  //"VALIDATE " como primer parametro recibe el nombre del campo y las reglas de validacion 
            'Nombre' => 'required',
            'Correo' => 'required|email',
            'Asunto' => 'required',
            'Contenido'=> 'required|min:10'
        ],

        [   
            //como segundo parametro puede recibir alguna edicion de la regla
            'Nombre.required' =>'Nesesito tu nombre',
            'Asunto.required' =>'Nesesito un asunto',
            'Correo.required' =>'Nesesito tu correo',
            'Contenido.required'=> 'Ups.. tu mensaje esta vacio'
            //estamos editando la regla required en el campo NOMBRE y mostrara el mensaje =>
        ]);

        Mail::to('jesus.97fsol@gmail.com')->queue(new MensajeRecibido($mensaje));
        // return new MensajeRecibido($mensaje);

        return back() ->with('status', 'Recibimos tu mensaje, te responderemos en menos de 24 horas.');
    }
}
