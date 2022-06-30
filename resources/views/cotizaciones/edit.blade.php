@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('cotizaciones.index') }}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form  action="{{ route('cotizaciones.update', $cotizacion) }}" method="POST" class="row g-3">
              @csrf
              @method('PUT')
              <div class="col-md-6">
                <label for="atencion" class="form-label">atencion</label>
                <input type="text" class="form-control shadow-none" id="atencion" name="atencion" value="{{ old('atencion',$cotizacion->atencion) }}">
                @error('atencion')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="vigencia_cot" class="form-label">vigencia_cot</label>
                <input type="date" class="form-control shadow-none" id="vigencia_cot" name="vigencia_cot" value="{{ old('vigencia_cot',$cotizacion->vigencia_cot) }}">
                @error('vigencia_cot')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="implemento" class="form-label">implemento</label>
                <select id="implemento" class="form-select shadow-none" name="cod_implemento" value="{{ old('cod_implemento') }}">
                  <option value="">Seleccionar...</option>
                  @foreach ($implementos as $imp)
                     <option value="{{$imp->cod_implemento}}" {{ ($cotizacion->cod_implemento == $imp->cod_implemento) ? 'selected' : '' }}>{{ $imp->marca }} </option>
                  @endforeach
                </select>
                @error('cod_implemento')
                    <small class="text-danger" role="alert">
                        Seleccione un implemento
                    </small>
                @enderror
                </div>

                <div class="col-md-6">
                <label for="productos" class="form-label">Productos</label><br>
                    @if(sizeof($productos) > 0)
                    @foreach ($productos as $cod_producto => $marca)
                        <input type="checkbox" value="{{ $cod_producto }}" name="productos[]"
                        {{ $cotizacion->productos->pluck('cod_producto')->contains($cod_producto) ? 'checked' : ''}} >
                        {{ $marca }}
                    @endforeach
                    <br>
                    @error('productos')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                    @else
                    <div class="alert alert-secondary">No se encontraron resultados.</div>
                    @error('productos')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                @endif
                </div>

              <div class="col-md-12">
                <button type="submit" class="btn btn-success">Actualizar</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection