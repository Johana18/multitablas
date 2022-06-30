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
                <div class="col-md-12">
                    <form  action="{{ route('clientes.store')}}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="enc_emp" class="form-label">Encargado de la empresa</label>
                            <input type="text" class="form-control shadow-none" id="enc_emp" name="enc_emp" value="{{old('enc_emp')}}">
                            @error('enc_emp')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="raz_soc" class="form-label">Razon Social</label>
                            <input type="text" class="form-control shadow-none" id="raz_soc" name="raz_soc" value="{{old('raz_soc')}}">
                            @error('raz_soc')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Telefono de la empresa</label>
                            <input type="tel" class="form-control shadow-none" id="telefono" name="telefono" value="{{old('telefono')}}">
                            @error('telefono')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="e_mail" class="form-label">E-mail de la empresa</label>
                            <input type="email" class="form-control shadow-none" id="e_mail" name="e_mail" value="{{old('e_mail')}}">
                            @error('e_mail')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection