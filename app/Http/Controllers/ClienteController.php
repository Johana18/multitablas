<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('cod_cliente','DESC')->paginate(3);

        return view('clientes.index',['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
            'enc_emp' => 'required',
            'raz_soc' => 'required',
            'telefono' => 'required',
            'e_mail' => 'required'
        ]);
        Cliente::create($request->all());
        return redirect()
            ->route('clientes.index')
            ->with('success','Cliente registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', ['cliente'=> $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', ['cliente'=> $cliente]);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request ->validate([
            'enc_emp' => 'required',
            'raz_soc' => 'required',
            'telefono' => 'required',
            'e_mail' => 'required'
        ]);

        $cliente->fill($request->only([
            'enc_emp',
            'raz_soc',
            'telefono',
            'e_mail',
        ]));
        
        if($cliente->isClean()){
            return back()->with('mensajedeadvertencia','Debe realizar al menos un cambio para actualizar');
        }

        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('mensajedeexito','Se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
