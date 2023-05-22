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
        return Cliente::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $usuario = $request->attributes->get('usuario');
        // $rol = $usuario->data->rol;
        // if ($rol != 'admin') {
        //     return response()->json(['error' => 'No tienes permiso para realizar esta acción'], 401);
        // }

        return Cliente::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente == null) {

            return response()->json(
                [
                    "resultado" => false,
                    "mensaje" => "Cliente no encontrado"
                ],
                404
            );
        }
        return Cliente::find($id);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente == null) {

            return response()->json(
                [
                    "resultado" => false,
                    "mensaje" => "Cliente no encontrado"
                ],
                404
            );
        }

        $cliente->update($request->all());
        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=Cliente::find($id);
        if ($cliente==null)
        {
            
            return response()->json(
               [ "resultado"=>false,
                "mensaje"=>"Cliente no encontrado"
               ]
            ,404);
        }
        $cliente->delete();
        return $cliente;
    }
}
