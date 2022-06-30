@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="pull-right">
		                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Cotizacion" href="{{ route('cotizaciones.create')}}"> 
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if(session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                </div>
                @endif
        <div class="col-md-12">
            <div class="pull-right">
                <div class="col-md-12">
                    
                </div>
            </div>
            <div class="col-md-12">
                @if(sizeof($cotizaciones) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Acciones</th>
                                <th scope="col">#</th>
                                <th scope="col">Atencion a:</th>
                                <th scope="col">Vigencia</th>
                                <th scope="col">Marca</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cotizaciones as $c)
                                <tr>
                                    <td class="text-center" width="20%">
                                        <a href="{{ route('cotizaciones.show', $c) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Ver Cotizacion">
                                            <i class="fa fa-book fa-fw text-white"></i>
                                        </a>
                                        <a href="{{ route('cotizaciones.edit', $c)}}" class="btn btn-success btn-sm shadow-none"data-toggle="tooltip" data-placement="top" title="Editar Cotizacion">
                                            <i class="fa fa-pencil fa-fw text-white"></i></a>
                                        </a>
                                        <form action="{{ route('cotizaciones.destroy', $c)}}" method="POST" class="d-inline-block">
                                            @csrf 
                                            @method('DELETE')
                                            <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Eliminar Cotizacion" onclick="return confirm('¿Estás seguro de eliminar?')">
                                                <i class="fa fa-trash-o fa-fw"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td scope="row">{{$c->cod_cotizacion}}</td>
                                    <td scope="row">{{$c->atencion}}</td>
                                    <td scope="row">{{$c->vigencia_cot}}</td>
                                    <td>{{$c->implemento->marca}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end ">
                        {!! $cotizaciones->links()!!}
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