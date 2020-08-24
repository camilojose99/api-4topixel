<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Departamentos;
use App\Models\Municipios;
use Illuminate\Http\Request;
use Validator;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();

        return response()->json($clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'primer_nombre'                     => 'required|min:3|max:30',
            'primer_apellido'                   => 'required|min:3|max:30',
            'email'                             => 'required|email|unique:clientes,email',
            'tipo_identificacion'               => 'required|in:CC,RC,TI,AS,MS,PA|max:2',
            'identificacion'                    => 'required|numeric|unique:clientes,identificacion|min:7',
            'telefono'                          => 'sometimes|nullable|numeric',
            'direccion'                         => 'required|min:3|max:125',
            'ocupacion'                         => 'sometimes|min:3|max:30',
            'departamentos_id'                  => 'required',
            'municipios_id'                     => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }

        $cliente = Clientes::create($request->all());
        return response()->json($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = Clientes::find($id);

        if (!$clientes) {
            return response()->json("No hay ningun dato relacionado al id: ".$id, 401);
        }

        $departamento = Departamentos::find($clientes->departamentos_id);
        $municipio = Municipios::find($clientes->municipios_id);

        $clientes->departamentos_id = $departamento->departamento;
        $clientes->municipios_id = $municipio->municipio;

        return response()->json($clientes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->json()->all(), [
            'primer_nombre'                     => 'required|min:3|max:30',
            'primer_apellido'                   => 'required|min:3|max:30',
            'telefono'                          => 'sometimes|nullable|numeric',
            'direccion'                         => 'required|min:3|max:125',
            'ocupacion'                         => 'sometimes|min:3|max:30',
            'departamentos_id'                  => 'required',
            'municipios_id'                     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        $cliente = Clientes::find($id)->update($request->all());

        return response()->json($cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Clientes::find($id);

        if (!$cliente) {
            return response()->json("No hay ningun dato relacionado al id: ".$id, 401);
        }

        $cliente->delete();

        return response()->json("El cliente ha sido eliminado", 200);

    }
    public function municipios($id)
    {
        $municipio = Municipios::where('departamentos_id',$id)->get();

        return response()->json($municipio);
    }
}
