@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('cotizaciones.index')}}"> 
                    <i class="fa fa-home "></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mx-auto" style="width: 50%;">
              <div class="card-header">
                Cotizacion
              </div>
              <div class="card-body text-center">
                <h5 class="card-title"><b>
                    {{$cotizacion->cod_cotizacion}}
                </b></h5>
                <h5>{{$cotizacion->atencion}}</h5>
                <h6>{{$cotizacion->vigencia_cot}}</h6>
                <h2 class="bold">{{$cotizacion->implemento->marca}}</h2>
                <h6>{{$cotizacion->implemento->descripcion}}</h6>
                    @foreach($cotizacion->productos as $producto)
                    <h6 class="bold">{{$producto->marca}}<h6>
                        <p>{{$producto->descripcion}}</p>
                        <p>{{$producto->costo}}</p>
                    @endforeach
              </div>
            </div>
        </div>
    </div>
</div>
@endsection