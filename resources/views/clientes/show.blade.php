@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('clientes.index')}}"> 
                    <i class="fa fa-home "></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mx-auto" style="width: 50%;">
              <div class="card-header">
                Cliente
              </div>
              <div class="card-body text-center">
                <h5 class="card-title"><b>
                    {{$cliente->enc_emp}}
                </b></h5>
                <h5>{{$cliente->raz_soc}}</h5>
                <h6>{{$cliente->telefono}}</h6>
                <h2 class="bold">{{$cliente->e_mail}}</h2>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection