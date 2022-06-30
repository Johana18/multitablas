@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('cotizaciones.index') }}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="col-md-12">

            <form  action="{{ route('cotizaciones.store') }}" method="POST" class="row g-3">
              @csrf
              <div class="col-md-6">
                <label for="atencion" class="form-label">atencion</label>
                <input type="text" class="form-control shadow-none" id="atencion" name="atencion" value="{{ old('atencion') }}">
                @error('atencion')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="vigencia_cot" class="form-label">vigencia_cot</label>
                <input type="date" class="form-control shadow-none" id="vigencia_cot" name="vigencia_cot" value="{{ old('vigencia_cot') }}">
                @error('vigencia_cot')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="implemento" class="form-label">implemento</label>
                <select id="implemento" class="form-select shadow-none" name="cod_implemento" value="{{ old('cod_implemento') }}">
                  <option value="" selected>Seleccionar...</option>
                  @foreach($implementos as $i)
                    <option value="{{$i->cod_implemento}}{{ old('cod_implemento') == $i->cod_implemento ? 'selected' : '' }} ">{{$i->marca}}</option>
                  @endforeach
                </select>
                @error('cod_implemento')
                    <small class="text-danger" role="alert">
                        Seleccione un implemento
                    </small>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="productos" class="form-label">productos</label><br>
                @if(sizeof($productos) > 0)
                  @foreach ($productos as $cod_producto => $marca)
                      <input type="checkbox" name="productos[]"  value="{{ $cod_producto }}"
                      {{ ( is_array(old('productos') ) && in_array($cod_producto, old('productos')) ) ? 'checked ' : '' }}">
                      {{ $marca }}
                  @endforeach
                  <br>
                  @error('$productos')
                    <small class="text-danger" role="alert">
                        Seleccione un producto
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
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>

        </div>
    </div>
</div>
@endsection