@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                @if(session('mensajedeadvertencia'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('mensajedeadvertencia') }}
                </div>
                @endif
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('implementos.index') }}"> 
                        <i class="fa fa-home fa-fw"></i> 
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <form  action="{{ route('implementos.update', $implemento) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="marca" class="form-label">Marca de Implemento</label>
                    <input type="text" class="form-control shadow-none" id="marca" name="marca" value="{{ old('marca',$implemento->marca) }}">
                    @error('marca')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div><div class="col-md-6">
                    <label for="descripcion" class="form-label">Descripción de Implemento</label>
                    <input type="text" class="form-control shadow-none" id="descripcion" name="descripcion" value="{{old('descripcion',$implemento->descripcion)}}">
                    @error('descripcion')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="costo" class="form-label">Costo de Implemento</label>
                    <input type="text" class="form-control shadow-none" id="costo" name="costo" value="{{old('costo',$implemento->costo)}}">
                    @error('costo')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection