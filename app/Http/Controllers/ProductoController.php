<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('cod_producto','DESC')->paginate(3);

        return view('productos.index',['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'marca' => 'required',
            'descripcion' => 'required',
            'costo' => 'required',
            'folio' => 'required'
        ]);
        Producto::create($request->all());
        return redirect()
            ->route('productos.index')
            ->with('success','Producto registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', ['producto'=> $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', ['producto'=> $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request ->validate([
            'folio' => 'required',
            'marca' => 'required',
            'descripcion' => 'required',
            'costo' => 'required'
        ]);

        $producto->fill($request->only([
            'folio',
            'marca',
            'descripcion',
            'costo',
        ]));
        
        if($producto->isClean()){
            return back()->with('mensajedeadvertencia','Debe realizar al menos un cambio para actualizar');
        }

        $producto->update($request->all());
        return redirect()->route('productos.index')->with('mensajedeexito','Se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
