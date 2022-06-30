<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\Implemento;
use App\Models\Producto;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones = Cotizacion::orderBy('cod_cotizacion','DESC')->paginate(5);
        return view('cotizaciones.index',['cotizaciones'=>$cotizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::pluck('marca','cod_producto');
        $implementos = Implemento::all();
        return view('cotizaciones.create',['implementos'=>$implementos,'productos'=>$productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'atencion'=> 'required',
            'vigencia_cot' => 'required',
            'cod_implemento' => 'required',
            'productos' => 'required',
        ]);

        $cotizacion = Cotizacion::create($request->all());
        $cotizacion->productos()->sync($request->productos);
        return redirect()
            ->route('cotizaciones.index')
            ->with('success','Cotizacion registrado correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizacion $cotizacion)
    {
        $productos = Producto::all();
        $implementos = Implemento::all();
        return view('cotizaciones.show', ['cotizacion'=> $cotizacion, 'implementos'=> $implementos, 'productos'=> $productos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizacion $cotizacion)
    {
        $productos = Producto::pluck('marca','cod_producto');
        $implementos = Implemento::all();
        return view('cotizaciones.edit',['implementos'=>$implementos,'productos'=>$productos,'cotizacion'=>$cotizacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        $request->validate([
            'atencion'=> 'required',
            'vigencia_cot' => 'required',
            'cod_implemento' => 'required',
            'productos' => 'required',
        ]);

        $cotizacion->fill($request->only([
            'atencion',
            'vigencia_cot',
            'cod_implemento',
            'productos'
        ]));

        $cotizacion->update($request->all());
        
        $cotizacion->productos()->sync($request->productos);
        
        return back()
            ->with('success','Cotizacion registrado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacion $cotizacion)
    {
        $cotizacion->delete();
        return back()->with('danger','Cotizacion eliminardo correctamente.');
    }
}
