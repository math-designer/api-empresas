<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class EmpresaResource extends Resource
{

    public function toArray($request)
    {
        return [
            'nome' => $this->empresa,
            'areaAtuacao' => $this->segmento,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'regiao' => $this->regiao,
            'cnpj' => $this->cnpj,
            'telefone' => $this->telefone,
            'email' => $this->email,
        ];
    }
}
