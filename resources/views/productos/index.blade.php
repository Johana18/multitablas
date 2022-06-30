@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="pull-right">
		                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Producto" href="{{ route('productos.create')}}"> 
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if(session('mensajedeexito'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('mensajedeexito') }}
                </div>
                @endif
        <div class="col-md-12">
            <div class="pull-right">
                <div class="col-md-12">
                    
                </div>
            </div>
            <div class="col-md-12">
                @if(sizeof($productos) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Acciones</th>
                                <th scope="col">#</th>
                                <th scope="col">Folio</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Descripción</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $p)
                                <tr>
                                    <td class="text-center" width="20%">
                                        <a href="{{ route('productos.show', $p) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Ver Producto">
                                            <i class="fa fa-book fa-fw text-white"></i>
                                        </a>
                                        <a href="{{ route('productos.edit', $p)}}" class="btn btn-success btn-sm shadow-none"data-toggle="tooltip" data-placement="top" title="Editar Producto">
                                            <i class="fa fa-pencil fa-fw text-white"></i></a>
                                        </a>
                                        <form action="{{ route('productos.destroy', $p)}}" method="POST" class="d-inline-block">
                                            @csrf 
                                            @method('DELETE')
                                            <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Eliminar Producto" onclick="return confirm('¿Estás seguro de eliminar?')">
                                                <i class="fa fa-trash-o fa-fw"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td scope="row">{{$p->cod_producto}}</td>
                                    <td scope="row">{{$p->folio}}</td>
                                    <td scope="row">{{$p->marca}}</td>
                                    <td scope="row">{{$p->descripcion}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end ">
                        {!! $productos->links()!!}
                        </div>
                    </div>
                @else
                <div class="alert alert-secondary">No se encontraron registros.</div>
                @endif
            </div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </div>
    </div>
</div>
@endsection