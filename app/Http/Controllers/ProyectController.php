<?php

namespace App\Http\Controllers;
 
use App\Project;
 
use Illuminate\Http\Request;


class ProyectController extends Controller
{

    public function __construct(){
        $this -> middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menu()
    {
        return view('home',[
            'Proyectos' => Project::get()
        ]);
    }

    public function index()
    {
        return view('Comidas.index' , [
            'Proyectos' => Project::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Comidas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        request()->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]); #todo esto lo podriamos guardar en la variable DATOS
        
        //recibimos los datos y los asignamos a variables
        $titulo = $request->get('titulo');
        $descripcion = $request->get('descripcion');
        $precio = $request->get('precio');

        Project::create([ # <-- este es el modelo project que creamos
            'titulo'=> $titulo,
            'descripcion'=> $descripcion,
            'precio'=> $precio,
        ]);

        /* OTRO METODO seria 
            Project::create(request()->all()) pero si deshabilitamos la propiedad fillable
            Project::create($DATOS)*/

        return redirect()->route('Admin.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $Proyect)
    {   // el metodo find es para buscar un registro en este caso por ID
        ;

        return view('Comidas.show' , [
            'proyect' => $Proyect
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $Proyect)
    {
        return view ('Comidas.editar',[
            'proyecto' => $Proyect
            // la primer variable va a ser la que se mande a la vista
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $Proyect)
    {   
        request()->validate([
        'titulo' => 'required',
        'descripcion' => 'required',
        'precio' => 'required',]);

        $Proyect->update([
            'titulo' => request('titulo'),
            'descripcion' => request('descripcion'),
            'precio' => request('precio')
        ]);
        return redirect()->route('Admin.index', $Proyect);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $proyect)
    {
        $proyect->delete();

        return redirect()->route('Admin.index');
    }
}
