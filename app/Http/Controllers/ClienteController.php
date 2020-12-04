<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Planos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Clientes::with('planos')->simplePaginate(15);
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
            'plano' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        DB::beginTransaction();
        try{
            $plano = Planos::find($request->get('plano'));
            $cliente = new Clientes();
            $cliente->fill($request->all());
            $cliente->save();

            $cliente->planos()->attach($plano);


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 409);
        }

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
        return Clientes::with('planos')->findOrFail($id);
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
            'plano' => ['sometimes', 'required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        DB::beginTransaction();
        try{
            $plano = Planos::find($request->get('plano'));

            $cliente = Clientes::find($id);
            $cliente->fill($request->all());
            $cliente->planos()->detach();
            $cliente->planos()->attach($plano);
            $cliente->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 409);
        }

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

        DB::beginTransaction();
        try {
            $cliente = Clientes::with('planos')->findOrFail($id);
    
            if ($cliente->estado === 'São Paulo' && $cliente->planos[0]->id === 1){
                throw new Exception('Esse cliente não pode ser excluido');
            }

            $cliente->planos()->detach();
            $cliente->delete();
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 409);
        }

        return response()->json('Cliente Deletado com sucesso', 204);
    }
}
