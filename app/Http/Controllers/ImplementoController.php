<?php

namespace App\Http\Controllers;

use App\Models\Implemento;
use Illuminate\Http\Request;

class ImplementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $implementos = Implemento::orderBy('cod_implemento','DESC')->paginate(3);

        return view('implementos.index',['implementos' => $implementos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('implementos.create');
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
            'costo' => 'required'
        ]);
        Implemento::create($request->all());
        return redirect()
            ->route('implementos.index')
            ->with('success','Servicio de implementacion registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Implemento  $implemento
     * @return \Illuminate\Http\Response
     */
    public function show(Implemento $implemento)
    {
        return view('implementos.show', ['implemento'=> $implemento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Implemento  $implemento
     * @return \Illuminate\Http\Response
     */
    public function edit(Implemento $implemento)
    {
        return view('implementos.edit', ['implemento'=> $implemento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Implemento  $implemento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Implemento $implemento)
    {
        $request ->validate([
            'marca' => 'required',
            'descripcion' => 'required',
            'costo' => 'required'
        ]);

        $implemento->fill($request->only([
            'marca',
            'descripcion',
            'costo',
        ]));
        
        if($implemento->isClean()){
            return back()->with('mensajedeadvertencia','Debe realizar al menos un cambio para actualizar');
        }

        $implemento->update($request->all());
        return redirect()->route('implementos.index')->with('mensajedeexito','Se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Implemento  $implemento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Implemento $implemento)
    {
        $implemento->delete();
        return redirect()->route('implementos.index');
    }
}
