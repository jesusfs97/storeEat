@extends('layout')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Role</div>
                <div class="panel-body">
                    <p><strong>Nombre</strong>{{ $role->name }}</p>
<<<<<<< HEAD
                    <p><strong>Slug</strong>{{ $role->slug }}</p>
=======
                    <p><strong>Slug</strong>{{ $role->name }}</p>
>>>>>>> 6ded2aca2a82631ac3f0e1ed7c59ab3d26c129f8
                    <p><strong>Descripción</strong>{{ $role->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection