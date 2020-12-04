<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
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
        return Clientes::simplePaginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validação dos dados
        $validator = validator($request->all(), [
            'nome' => ['required'],
            'email' => ['required', 'email', 'unique:clientes,email'],
            'telefone' => ['required', 'regex:/\([0-9]{2}\)[0-9]{4,5}-[0-9]{4}$/'],
            'estado' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'data_de_nascimento' => ['required', 'date_format:d/m/Y'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        $cliente = new Clientes();
        $cliente->fill($request->all());
        $cliente->save();

        return $cliente;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Clientes::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validação dos dados
        $validator = validator($request->all(), [
            'nome' => ['sometimes', 'required'],
            'email' => ['sometimes', 'required', 'email', 'unique:clientes,email,'.$id],
            'telefone' => ['sometimes', 'required', 'regex:/\([0-9]{2}\)[0-9]{4,5}-[0-9]{4}$/'],
            'estado' => ['sometimes', 'required', 'string'],
            'cidade' => ['sometimes', 'required', 'string'],
            'data_de_nascimento' => ['sometimes', 'required', 'date_format:d/m/Y'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        $cliente = Clientes::find($id);
        $cliente->fill($request->all());
        $cliente->save();

        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();

        return response()->json('Cliente Deletado com sucesso', 204);
    }
}
