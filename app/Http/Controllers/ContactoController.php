<?php

namespace App\Http\Controllers;

class ContactoController extends Controller
{
    public function store(){

        // esto es para hacer la validacion de los cmpos en el formulario 
        request()->validate([  //"VALIDATE " como primer parametro recibe el nombre del campo y las reglas de validacion 
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

        return back() ->with('status', 'Recibimos tu mensaje, te responderemos en menos de 24 horas.');
    }
}
