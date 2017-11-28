<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Http\Resources\EmpresaResource;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        return EmpresaResource::collection($empresas);
    }

    public function search($areaAtuacao, $regiao)
    {
        $empresas = Empresa::where([
            ['segmento', '=', urldecode($areaAtuacao)],
            ['regiao', '=', $regiao]
        ])->get();

        return EmpresaResource::collection($empresas);
    }

    public function create(Request $request)
    {
        $empresa = [
            'id' => $request->input('id'),
            'empresa' => $request->input('nome'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'segmento' => $request->input('areaAtuacao'),
            'regiao' => $request->input('regiao'),
            'cnpj' => $request->input('cnpj'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')
        ];

        try {
            Empresa::create($empresa);
            return response()->json(['msg' => 'Empresa inserida', 'status' => 100]);
        } catch (\Exception $e) {
            \Log::error('Falha ao inserir empresa: ' . $e->getMessage());
            return response()->json(['msg' => 'Falha ao inserir empresa', 'status' => 101]);
        }
    }
}
