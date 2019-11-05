@extends('layout')


@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h2 class="display-3">Productos</h2>

                    @can('products.create')
                    <a href="{{ route('products.create') }}"
                    class="btn btn-sm btn-primary pull-rigth">
                      Crear
                    </a>
                    @endcan

                </div>

                <div class="panel-body">
                    <table class="table table-tablestriped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td width="10px">
                                @can('products.show')
                                <a href="{{ route('products.show', $product->id) }}"
                                class="btn btn-sm btn-success">
                                    Ver
                                </a>
                                @endcan
                                </td>
                                <td width="10px">
                                    @can('products.edit')
                                        <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-sm btn-light">
                                            Editar
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                     @can('products.destroy')
                                     {!! Form::open(['route' => ['products.destroy', $product->id],
                                     'method' => 'DELETE']) !!}
                                         <button class="btn btn-sm btn-danger">
                                             Eliminar
                                         </button>

                                     {!! Form::close() !!}
                                        
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->render() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
