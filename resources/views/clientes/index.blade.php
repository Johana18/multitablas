@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="pull-right">
		                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Cliente" href="{{ route('clientes.create')}}"> 
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
                @if(sizeof($clientes) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Acciones</th>
                                <th scope="col">#</th>
                                <th scope="col">Encargado</th>
                                <th scope="col">Razon</th>
                                <th scope="col">telefono</th>
                                <th scope="col">E-mail</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $c)
                                <tr>
                                    <td class="text-center" width="20%">
                                        <a href="{{ route('clientes.show', $c) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Ver Cliente">
                                            <i class="fa fa-book fa-fw text-white"></i>
                                        </a>
                                        <a href="{{ route('clientes.edit', $c)}}" class="btn btn-success btn-sm shadow-none"data-toggle="tooltip" data-placement="top" title="Editar Cliente">
                                            <i class="fa fa-pencil fa-fw text-white"></i></a>
                                        </a>
                                        <form action="{{ route('clientes.destroy', $c)}}" method="POST" class="d-inline-block">
                                            @csrf 
                                            @method('DELETE')
                                            <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Eliminar Cliente" onclick="return confirm('¿Estás seguro de eliminar?')">
                                                <i class="fa fa-trash-o fa-fw"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td scope="row">{{$c->cod_cliente}}</td>
                                    <td scope="row">{{$c->enc_emp}}</td>
                                    <td scope="row">{{$c->raz_soc}}</td>
                                    <td scope="row">{{$c->telefono}}</td>
                                    <td scope="row">{{$c->e_mail}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end ">
                        {!! $clientes->links()!!}
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