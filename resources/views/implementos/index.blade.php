@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
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
                    <div class="pull-right">
		                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Implemento" href="{{ route('implementos.create')}}"> 
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @if(sizeof($implementos) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Acciones</th>
                                <th scope="col">#</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Descripción</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($implementos as $i)
                                <tr>
                                    <td class="text-center" width="20%">
                                        <a href="{{ route('implementos.show', $i) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Ver Implemento">
                                            <i class="fa fa-book fa-fw text-white"></i>
                                        </a>
                                        <a href="{{ route('implementos.edit', $i)}}" class="btn btn-success btn-sm shadow-none"data-toggle="tooltip" data-placement="top" title="Editar Implemento">
                                            <i class="fa fa-pencil fa-fw text-white"></i></a>
                                        </a>
                                        <form action="{{ route('implementos.destroy', $i)}}" method="POST" class="d-inline-block">
                                            @csrf 
                                            @method('DELETE')
                                            <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Eliminar Implemento" onclick="return confirm('¿Estás seguro de eliminar?')">
                                                <i class="fa fa-trash-o fa-fw"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td scope="row">{{$i->cod_implemento}}</td>
                                    <td scope="row">{{$i->marca}}</td>
                                    <td scope="row">{{$i->descripcion}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end ">
                        {!! $implementos->links()!!}
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