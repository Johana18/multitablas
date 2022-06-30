@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('implementos.index')}}"> 
                        <i class="fa fa-home "></i> 
                    </a>
                </div>
                <div class="col-md-12">
                    <form  action="{{ route('implementos.store')}}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="marca" class="form-label">Marca de Implemento</label>
                            <input type="text" class="form-control shadow-none" id="marca" name="marca" value="{{old('marca')}}">
                            @error('marca')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="descripcion" class="form-label">Descripción de Implemento</label>
                            <input type="text" class="form-control shadow-none" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
                            @error('descripcion')
                                <small class="text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="costo" class="form-label">Costo de Implemento</label>
                            <input type="number" class="form-control shadow-none" id="costo" name="costo" value="{{old('costo')}}">
                            @error('costo')
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